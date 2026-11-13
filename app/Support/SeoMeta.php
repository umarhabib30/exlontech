<?php

namespace App\Support;

class SeoMeta
{
    public static function make(array $overrides = [], ?string $fallbackTitle = null): array
    {
        $contact = config('seo.contact', []);

        $defaults = [
            'title' => $fallbackTitle ?: 'Exlon Tech | Web Development, Mobile Apps, Design & Digital Marketing',
            'description' => config('seo.description'),
            'keywords' => 'Exlon Tech, web development company Pakistan, mobile app development, UI UX design, graphic design, digital marketing, SEO services Sargodha, video editing, Laravel development, software company Pakistan',
            'canonical' => self::currentCanonicalUrl(),
            'image' => config('seo.default_image'),
            'image_alt' => 'Exlon Tech digital agency',
            'image_width' => (int) config('seo.default_image_width', 1200),
            'image_height' => (int) config('seo.default_image_height', 630),
            'type' => 'website',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'googlebot' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'site_name' => config('seo.site_name', 'Exlon Tech'),
            'twitter_card' => 'summary_large_image',
            'locale' => config('seo.locale', 'en_US'),
            'language' => config('seo.language', 'en'),
            'author' => 'Exlon Tech',
            'publisher' => 'Exlon Tech',
            'copyright' => 'Exlon Tech',
            'application_name' => 'Exlon Tech',
            'theme_color' => config('seo.theme_color', '#8750f7'),
            'geo_region' => $contact['geo_region'] ?? 'PK-PB',
            'geo_placename' => $contact['geo_placename'] ?? 'Sargodha, Pakistan',
            'geo_position' => ($contact['latitude'] ?? '32.0836') . ';' . ($contact['longitude'] ?? '72.6711'),
            'icbm' => ($contact['latitude'] ?? '32.0836') . ', ' . ($contact['longitude'] ?? '72.6711'),
            'telephone' => $contact['telephone'] ?? '+92-309-6176606',
            'email' => $contact['email'] ?? 'info@exlontech.com',
            'address_locality' => $contact['address_locality'] ?? 'Sargodha',
            'address_region' => $contact['address_region'] ?? 'Punjab',
            'address_country' => $contact['address_country'] ?? 'PK',
            'page_type' => 'WebPage',
            'breadcrumbs' => [],
            'faqs' => [],
            'service_name' => null,
            'service_type' => null,
            'json_ld_extra' => [],
        ];

        $meta = array_merge($defaults, array_filter(
            $overrides,
            fn ($value) => $value !== null && $value !== ''
        ));

        if (isset($overrides['faqs']) && is_array($overrides['faqs'])) {
            $meta['faqs'] = $overrides['faqs'];
        }

        if (isset($overrides['breadcrumbs']) && is_array($overrides['breadcrumbs'])) {
            $meta['breadcrumbs'] = $overrides['breadcrumbs'];
        }

        if (isset($overrides['json_ld_extra']) && is_array($overrides['json_ld_extra'])) {
            $meta['json_ld_extra'] = $overrides['json_ld_extra'];
        }

        $meta['title'] = self::trim($meta['title'], 70);
        $meta['description'] = self::trim($meta['description'], 160);
        $meta['canonical'] = self::canonicalUrl($meta['canonical']);
        $meta['image'] = self::assetUrl($meta['image']);
        $meta['image_alt'] = self::trim($meta['image_alt'] ?: $meta['title'], 120);

        if (empty($meta['breadcrumbs'])) {
            $meta['breadcrumbs'] = self::defaultBreadcrumbs($meta);
        }

        return $meta;
    }

    public static function graphs(array $seo): array
    {
        $graphs = [
            self::organizationSchema($seo),
            self::websiteSchema($seo),
            self::webPageSchema($seo),
        ];

        if (! empty($seo['breadcrumbs'])) {
            $graphs[] = self::breadcrumbSchema($seo);
        }

        if (! empty($seo['service_name'])) {
            $graphs[] = self::serviceSchema($seo);
        }

        if (! empty($seo['faqs'])) {
            $graphs[] = self::faqSchema($seo['faqs']);
        }

        return array_merge($graphs, $seo['json_ld_extra'] ?? []);
    }

    public static function organizationSchema(array $seo): array
    {
        $orgId = self::siteUrl() . '/#organization';
        $logoUrl = self::assetUrl(config('seo.logo', 'assets/img/logo/logo.png'));

        return [
            '@context' => 'https://schema.org',
            '@type' => ['Organization', 'ProfessionalService'],
            '@id' => $orgId,
            'name' => config('seo.site_name', 'Exlon Tech'),
            'alternateName' => 'ExlonTech',
            'legalName' => config('seo.legal_name', 'Exlon Tech'),
            'url' => self::siteUrl(),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => $logoUrl,
                'width' => (int) config('seo.logo_width', 3402),
                'height' => (int) config('seo.logo_height', 763),
            ],
            'image' => $seo['image'],
            'description' => config('seo.description', $seo['description']),
            'slogan' => config('seo.slogan'),
            'email' => $seo['email'],
            'telephone' => $seo['telephone'],
            'priceRange' => config('seo.price_range', '$$'),
            'currenciesAccepted' => 'PKR, USD',
            'paymentAccepted' => 'Cash, Bank Transfer, Credit Card',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $seo['address_locality'],
                'addressRegion' => $seo['address_region'],
                'addressCountry' => $seo['address_country'],
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => (float) (config('seo.contact.latitude') ?? 32.0836),
                'longitude' => (float) (config('seo.contact.longitude') ?? 72.6711),
            ],
            'areaServed' => config('seo.area_served', ['Pakistan', 'Worldwide']),
            'knowsAbout' => config('seo.knows_about', []),
            'sameAs' => config('seo.social', []),
            'contactPoint' => [
                [
                    '@type' => 'ContactPoint',
                    'telephone' => $seo['telephone'],
                    'contactType' => 'customer service',
                    'email' => $seo['email'],
                    'areaServed' => ['PK', 'Worldwide'],
                    'availableLanguage' => ['English', 'Urdu'],
                ],
                [
                    '@type' => 'ContactPoint',
                    'telephone' => $seo['telephone'],
                    'contactType' => 'sales',
                    'email' => $seo['email'],
                    'areaServed' => ['PK', 'Worldwide'],
                    'availableLanguage' => ['English', 'Urdu'],
                ],
            ],
            'hasOfferCatalog' => self::offerCatalog(),
        ];
    }

    public static function websiteSchema(array $seo): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => self::siteUrl() . '/#website',
            'name' => $seo['site_name'],
            'url' => self::siteUrl(),
            'description' => config('seo.description', $seo['description']),
            'inLanguage' => $seo['language'],
            'publisher' => [
                '@id' => self::siteUrl() . '/#organization',
            ],
        ];
    }

    public static function webPageSchema(array $seo): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => $seo['page_type'] ?? 'WebPage',
            '@id' => $seo['canonical'] . '#webpage',
            'name' => $seo['title'],
            'headline' => $seo['title'],
            'description' => $seo['description'],
            'url' => $seo['canonical'],
            'inLanguage' => $seo['language'],
            'isPartOf' => [
                '@id' => self::siteUrl() . '/#website',
            ],
            'about' => [
                '@id' => self::siteUrl() . '/#organization',
            ],
            'primaryImageOfPage' => [
                '@type' => 'ImageObject',
                'url' => $seo['image'],
                'width' => (int) ($seo['image_width'] ?? 1200),
                'height' => (int) ($seo['image_height'] ?? 630),
            ],
        ];

        if (! empty($seo['breadcrumbs'])) {
            $schema['breadcrumb'] = [
                '@id' => $seo['canonical'] . '#breadcrumb',
            ];
        }

        return $schema;
    }

    public static function breadcrumbSchema(array $seo): array
    {
        $items = [];

        foreach (array_values($seo['breadcrumbs']) as $index => $crumb) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $crumb['name'],
                'item' => self::canonicalUrl($crumb['url']),
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            '@id' => $seo['canonical'] . '#breadcrumb',
            'itemListElement' => $items,
        ];
    }

    public static function serviceSchema(array $seo): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $seo['service_name'],
            'serviceType' => $seo['service_type'] ?: $seo['service_name'],
            'description' => $seo['description'],
            'url' => $seo['canonical'],
            'image' => $seo['image'],
            'provider' => [
                '@id' => self::siteUrl() . '/#organization',
            ],
            'areaServed' => config('seo.area_served', ['Pakistan', 'Worldwide']),
            'audience' => [
                '@type' => 'BusinessAudience',
                'audienceType' => 'Businesses and startups',
            ],
        ];
    }

    public static function faqSchema(array $faqs): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn (array $faq) => [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['a'],
                ],
            ], $faqs),
        ];
    }

    public static function offerCatalog(): array
    {
        $items = [];

        foreach (config('seo.services', []) as $service) {
            $items[] = [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $service['name'],
                    'url' => self::canonicalUrl($service['path']),
                    'description' => $service['summary'] ?? $service['description'],
                ],
            ];
        }

        return [
            '@type' => 'OfferCatalog',
            'name' => 'Exlon Tech digital services',
            'itemListElement' => $items,
        ];
    }

    public static function breadcrumbsFor(string $name, string $url, array $parents = []): array
    {
        $crumbs = array_merge([
            ['name' => 'Home', 'url' => self::siteUrl() . '/'],
        ], $parents);

        $crumbs[] = ['name' => $name, 'url' => $url];

        return $crumbs;
    }

    public static function currentCanonicalUrl(): string
    {
        $path = request()->getPathInfo() ?: '/';

        return self::canonicalUrl($path);
    }

    public static function siteUrl(): string
    {
        return rtrim(self::normalizeUrl(config('seo.site_url', 'https://exlontech.com'), true), '/');
    }

    public static function canonicalUrl(string $url): string
    {
        return self::normalizeUrl($url, true);
    }

    public static function assetUrl(string $url): string
    {
        // An absolute URL may legitimately be off-domain (a CDN), so leave it be.
        if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
            return $url;
        }

        return self::normalizeUrl(self::siteUrl() . '/' . ltrim($url, '/'), false);
    }

    private static function defaultBreadcrumbs(array $seo): array
    {
        $path = parse_url($seo['canonical'], PHP_URL_PATH) ?: '/';

        if ($path === '/') {
            return [
                ['name' => 'Home', 'url' => self::siteUrl() . '/'],
            ];
        }

        return self::breadcrumbsFor($seo['title'], $seo['canonical']);
    }

    /**
     * Scheme, host and port always come from the configured site URL, never
     * from the URL passed in. Callers hand us route()/url()->current() output,
     * which is built from APP_URL, so trusting the incoming host let a
     * misconfigured deploy emit canonicals pointing at the wrong subdomain.
     * Only the path and query are taken from the argument.
     */
    private static function normalizeUrl(string $url, bool $trimTrailingSlash): string
    {
        $base = parse_url(config('seo.site_url', 'https://exlontech.com')) ?: [];
        $parts = parse_url($url) ?: [];

        $scheme = $base['scheme'] ?? 'https';
        $host = strtolower($base['host'] ?? 'exlontech.com');
        $port = $base['port'] ?? null;
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
