<?php

namespace App\Support;

class SeoMeta
{
    public static function make(array $overrides = [], ?string $fallbackTitle = null): array
    {
        $defaults = [
            'title' => $fallbackTitle ?: 'ExlonTech | Web, Mobile App, SaaS & Digital Marketing Agency',
            'description' => 'ExlonTech helps startups, SMEs, and global businesses build custom websites, mobile apps, SaaS platforms, ecommerce stores, SEO campaigns, and digital marketing systems.',
            'keywords' => 'ExlonTech, custom software development company, web development agency for startups, mobile app development company, SaaS development company, Laravel development agency, Flutter app development company, ecommerce development agency, SEO agency for small businesses, remote software development team, software outsourcing company Pakistan',
            'canonical' => self::currentCanonicalUrl(),
            'image' => self::assetUrl('assets/img/services/web hero.jpg'),
            'image_alt' => 'ExlonTech digital agency serving global businesses',
            'type' => 'website',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'googlebot' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'site_name' => 'ExlonTech',
            'twitter_card' => 'summary_large_image',
            'locale' => 'en_US',
            'language' => 'en',
            'author' => 'ExlonTech',
            'publisher' => 'ExlonTech',
            'copyright' => 'ExlonTech',
            'application_name' => 'ExlonTech',
            'theme_color' => '#8750f7',
            'geo_region' => 'PK-PB',
            'geo_placename' => 'Sargodha, Pakistan',
            'telephone' => '+92-309-6176606',
            'email' => 'info@exlontech.com',
            'address_locality' => 'Sargodha',
            'address_region' => 'Punjab',
            'address_country' => 'PK',
            'breadcrumbs' => [],
            'service' => null,
            'faqs' => [],
            'json_ld_extra' => [],
        ];

        $meta = array_merge($defaults, array_filter(
            $overrides,
            fn ($value) => $value !== null && $value !== ''
        ));

        $meta['title'] = self::trim($meta['title'], 70);
        $meta['description'] = self::trim($meta['description'], 160);
        $meta['canonical'] = self::canonicalUrl($meta['canonical']);
        $meta['image'] = self::assetUrl($meta['image']);
        $meta['image_alt'] = self::trim($meta['image_alt'] ?: $meta['title'], 120);

        return $meta;
    }

    public static function organizationSchema(array $seo): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'ExlonTech',
            'url' => self::siteUrl(),
            'logo' => self::assetUrl('assets/img/logo/logo.png'),
            'image' => $seo['image'],
            'description' => 'ExlonTech is a Pakistan-based digital solutions company serving global businesses with web development, mobile app development, custom software, ecommerce, SEO, UI/UX design, branding, and digital marketing services.',
            'email' => $seo['email'],
            'telephone' => $seo['telephone'],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $seo['address_locality'],
                'addressRegion' => $seo['address_region'],
                'addressCountry' => $seo['address_country'],
            ],
            'sameAs' => [
                'https://www.facebook.com/exlontech/',
                'https://www.instagram.com/exlontech/',
                'https://www.linkedin.com/company/exlon-tech',
                'https://www.pinterest.com/exlontech/',
            ],
        ];
    }

    public static function websiteSchema(array $seo): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $seo['site_name'],
            'url' => self::siteUrl(),
            'description' => $seo['description'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'ExlonTech',
            ],
            'inLanguage' => $seo['language'],
        ];
    }

    public static function breadcrumbSchema(array $breadcrumbs): ?array
    {
        if (count($breadcrumbs) < 2) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array_values(array_map(
                fn ($item, $index) => [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['name'],
                    'item' => self::canonicalUrl($item['url']),
                ],
                $breadcrumbs,
                array_keys($breadcrumbs)
            )),
        ];
    }

    public static function serviceSchema(array $service, array $seo): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $service['name'],
            'description' => $service['description'] ?? $seo['description'],
            'provider' => [
                '@type' => 'Organization',
                'name' => 'ExlonTech',
                'url' => self::siteUrl(),
            ],
            'areaServed' => 'Worldwide',
            'serviceType' => $service['type'] ?? $service['name'],
            'url' => $seo['canonical'],
        ];
    }

    public static function faqSchema(array $faqs): ?array
    {
        if ($faqs === []) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn ($faq) => [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['a'],
                ],
            ], $faqs),
        ];
    }

    public static function webPageSchema(array $seo): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $seo['title'],
            'description' => $seo['description'],
            'url' => $seo['canonical'],
            'inLanguage' => $seo['language'],
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => $seo['site_name'],
                'url' => self::siteUrl(),
            ],
        ];
    }

    public static function currentCanonicalUrl(): string
    {
        $path = request()->getPathInfo() ?: '/';

        return self::canonicalUrl($path);
    }

    public static function siteUrl(): string
    {
        return self::normalizeUrl(config('seo.site_url', config('app.url', url('/'))), false);
    }

    public static function canonicalUrl(string $url): string
    {
        return self::normalizeUrl($url, true);
    }

    public static function assetUrl(string $url): string
    {
        if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
            return self::normalizeUrl($url, false);
        }

        return self::normalizeUrl(self::siteUrl() . '/' . ltrim($url, '/'), false);
    }

    private static function normalizeUrl(string $url, bool $trimTrailingSlash): string
    {
        $base = parse_url(config('seo.site_url', config('app.url', url('/')))) ?: [];
        $parts = parse_url($url) ?: [];

        $scheme = $parts['scheme'] ?? ($base['scheme'] ?? 'https');
        $host = strtolower($parts['host'] ?? ($base['host'] ?? request()->getHost()));
        $port = $parts['port'] ?? ($base['port'] ?? null);
        $path = $parts['path'] ?? '/';
        $query = $parts['query'] ?? null;

        if (! str_starts_with($path, '/')) {
            $path = '/' . $path;
        }

        if ($trimTrailingSlash && $path !== '/') {
            $path = rtrim($path, '/');
        }

        $normalized = $scheme . '://' . $host;

        if ($port && ! in_array([$scheme, $port], [['http', 80], ['https', 443]], true)) {
            $normalized .= ':' . $port;
        }

        $normalized .= $path;

        if ($query) {
            $normalized .= '?' . $query;
        }

        return $normalized;
    }

    private static function trim(string $value, int $limit): string
    {
        $value = trim(preg_replace('/\s+/', ' ', $value) ?? $value);

        if (mb_strlen($value) <= $limit) {
            return $value;
        }

        return rtrim(mb_substr($value, 0, $limit - 1)) . '…';
    }
}
