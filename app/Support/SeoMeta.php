<?php

namespace App\Support;

class SeoMeta
{
    public static function make(array $overrides = [], ?string $fallbackTitle = null): array
    {
        $defaults = [
            'title' => $fallbackTitle ?: 'Exlon Tech | Web Development, Mobile Apps, Design & Digital Marketing',
            'description' => 'Exlon Tech builds modern websites, mobile apps, UI/UX design, branding, SEO, digital marketing, and video editing solutions for businesses in Pakistan and worldwide.',
            'keywords' => 'Exlon Tech, web development, mobile app development, UI UX design, graphic design, digital marketing, SEO services, video editing, Laravel development, software company Pakistan, Sargodha',
            'canonical' => self::currentCanonicalUrl(),
            'image' => asset('assets/img/services/web hero.jpg'),
            'image_alt' => 'Exlon Tech digital agency',
            'type' => 'website',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'googlebot' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'site_name' => 'Exlon Tech',
            'twitter_card' => 'summary_large_image',
            'locale' => 'en_US',
            'language' => 'en',
            'author' => 'Exlon Tech',
            'publisher' => 'Exlon Tech',
            'copyright' => 'Exlon Tech',
            'application_name' => 'Exlon Tech',
            'theme_color' => '#8750f7',
            'geo_region' => 'PK-PB',
            'geo_placename' => 'Sargodha, Pakistan',
            'telephone' => '+92-309-6176606',
            'email' => 'info@exlontech.com',
            'address_locality' => 'Sargodha',
            'address_region' => 'Punjab',
            'address_country' => 'PK',
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
            'name' => 'Exlon Tech',
            'url' => self::siteUrl(),
            'logo' => self::assetUrl('assets/img/logo/logo.png'),
            'image' => $seo['image'],
            'description' => $seo['description'],
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
                'name' => 'Exlon Tech',
            ],
            'inLanguage' => $seo['language'],
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
        return self::normalizeUrl(config('app.url', url('/')), false);
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

        return self::normalizeUrl(asset(ltrim($url, '/')), false);
    }

    private static function normalizeUrl(string $url, bool $trimTrailingSlash): string
    {
        $base = parse_url(config('app.url', url('/'))) ?: [];
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
