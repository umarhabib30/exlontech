<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoDiscoveryTest extends TestCase
{
    public function test_llms_txt_is_available(): void
    {
        $response = $this->get('/llms.txt');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $response->assertSee('Exlon Tech', false);
        $response->assertSee('/services/web', false);
        $response->assertSee('llms-full.txt', false);
    }

    public function test_llms_full_txt_includes_services_and_faqs(): void
    {
        $response = $this->get('/llms-full.txt');

        $response->assertOk();
        $response->assertSee('Web Development', false);
        $response->assertSee('How long does SEO take', false);
        $response->assertSee('info@exlontech.com', false);
    }

    public function test_home_page_includes_structured_data_and_llms_link(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('application/ld+json', false);
        $response->assertSee('ProfessionalService', false);
        $response->assertSee('OfferCatalog', false);
        $response->assertSee('llms.txt', false);
        $response->assertSee('<link rel="canonical"', false);
    }

    public function test_service_page_includes_faq_and_service_schema(): void
    {
        $response = $this->get('/services/seo');

        $response->assertOk();
        $response->assertSee('FAQPage', false);
        $response->assertSee('"@type":"Service"', false);
        $response->assertSee('BreadcrumbList', false);
    }

    public function test_sitemap_includes_every_public_page(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/xml; charset=UTF-8');

        foreach (['/', '/about', '/portfolio', '/careers', '/privacy-policy'] as $path) {
            $response->assertSee('<loc>https://exlontech.com' . $path . '</loc>', false);
        }

        foreach (array_keys(config('seo.services')) as $key) {
            $response->assertSee('<loc>https://exlontech.com/' . config("seo.services.{$key}.path") . '</loc>', false);
        }
    }

    public function test_sitemap_does_not_expose_admin_urls(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertDontSee('/admin', false);
    }

    public function test_robots_txt_references_sitemap_and_llms_files(): void
    {
        $robots = file_get_contents(public_path('robots.txt'));

        $this->assertStringContainsString('Sitemap: https://exlontech.com/sitemap.xml', $robots);
        $this->assertStringContainsString('/llms.txt', $robots);
        $this->assertStringContainsString('/llms-full.txt', $robots);
    }

    public function test_robots_txt_blocks_admin_for_every_declared_group(): void
    {
        $robots = file_get_contents(public_path('robots.txt'));

        // A crawler that matches its own group ignores the "*" group, so each
        // group must repeat the admin block.
        $groups = preg_split('/\n\s*\n/', trim($robots));
        $groups = array_filter($groups, fn ($group) => str_contains($group, 'User-agent:'));

        $this->assertNotEmpty($groups);

        foreach ($groups as $group) {
            $this->assertStringContainsString('Disallow: /admin', $group);
        }
    }

    public function test_llms_files_are_served_by_the_route_not_a_stale_static_copy(): void
    {
        $this->assertFileDoesNotExist(public_path('llms.txt'));
        $this->assertFileDoesNotExist(public_path('llms-full.txt'));
    }

    public function test_www_host_redirects_to_the_canonical_host(): void
    {
        foreach (['/', '/about', '/services/seo'] as $path) {
            $response = $this->get('https://www.exlontech.com' . $path);

            $response->assertStatus(301);
            $response->assertRedirect('https://exlontech.com' . ($path === '/' ? '/' : $path));
        }
    }

    public function test_canonical_host_is_not_redirected(): void
    {
        $this->get('https://exlontech.com/about')->assertOk();
    }

    public function test_every_public_page_has_exactly_one_h1(): void
    {
        $paths = ['/', '/about', '/portfolio', '/careers', '/privacy-policy'];

        foreach (array_keys(config('seo.services')) as $key) {
            $paths[] = '/' . config("seo.services.{$key}.path");
        }

        foreach ($paths as $path) {
            $html = $this->get($path)->assertOk()->getContent();
            $count = preg_match_all('/<h1[\s>]/i', $html);

            $this->assertSame(1, $count, "Expected exactly one <h1> on {$path}, found {$count}.");
        }
    }

    public function test_canonical_always_points_at_the_public_domain(): void
    {
        foreach (['/', '/about', '/services/seo', '/portfolio'] as $path) {
            $html = $this->get($path)->assertOk()->getContent();

            preg_match('/<link rel="canonical" href="([^"]+)"/', $html, $m);

            $this->assertNotEmpty($m, "No canonical tag on {$path}.");
            $this->assertSame(
                'exlontech.com',
                parse_url($m[1], PHP_URL_HOST),
                "Canonical on {$path} points off-domain: {$m[1]}"
            );
        }
    }

    public function test_no_view_references_a_missing_or_miscased_public_asset(): void
    {
        $public = public_path();
        $existing = [];

        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($public));
        foreach ($files as $file) {
            if ($file->isFile()) {
                $existing[str_replace('\\', '/', substr($file->getPathname(), strlen($public) + 1))] = true;
            }
        }

        $broken = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(resource_path('views'))
        );

        foreach ($iterator as $file) {
            if (! $file->isFile() || ! str_ends_with($file->getFilename(), '.blade.php')) {
                continue;
            }

            $contents = file_get_contents($file->getPathname());

            preg_match_all(
                '/(?:asset|public_asset)\(\s*[\'"]([^\'"$]+)[\'"]\s*\)/',
                $contents,
                $matches
            );

            foreach ($matches[1] as $ref) {
                $ref = ltrim(trim($ref), '/');

                if ($ref === '' || str_ends_with($ref, '/')) {
                    continue;
                }

                if (! isset($existing[$ref])) {
                    $broken[] = basename($file->getPathname()) . ' -> ' . $ref;
                }
            }
        }

        $this->assertSame([], $broken, "Broken/miscased asset references:\n" . implode("\n", $broken));
    }

    public function test_no_view_links_to_a_bare_email_address(): void
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(resource_path('views'))
        );

        $offenders = [];

        foreach ($iterator as $file) {
            if (! $file->isFile() || ! str_ends_with($file->getFilename(), '.blade.php')) {
                continue;
            }

            $contents = file_get_contents($file->getPathname());

            // href="someone@example.com" resolves as a relative path and 404s.
            if (preg_match('/href=["\'](?!mailto:)[^"\':\/]+@[^"\']+["\']/', $contents)) {
                $offenders[] = $file->getFilename();
            }
        }

        $this->assertSame([], $offenders);
    }

    public function test_home_has_no_links_to_the_nonexistent_blog_page(): void
    {
        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringNotContainsString('blog-details.html', $html);
    }

    public function test_https_responses_advertise_hsts(): void
    {
        $response = $this->get('https://exlontech.com/');

        $response->assertOk();
        $this->assertStringContainsString(
            'max-age=',
            (string) $response->headers->get('Strict-Transport-Security')
        );
    }

    public function test_privacy_policy_page_is_indexable(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertOk();
        $response->assertSee('Privacy Policy', false);
        $response->assertSee('canonical', false);
    }
}
