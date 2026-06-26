@php
    $seo = \App\Support\SeoMeta::make($meta ?? [], $title ?? null);

    $structuredData = array_merge(
        [
            \App\Support\SeoMeta::organizationSchema($seo),
            \App\Support\SeoMeta::websiteSchema($seo),
            \App\Support\SeoMeta::webPageSchema($seo),
        ],
        $seo['json_ld_extra'] ?? []
    );
@endphp

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $seo['title'] }}</title>

<meta name="description" content="{{ $seo['description'] }}" />
<meta name="keywords" content="{{ $seo['keywords'] }}" />
<meta name="author" content="{{ $seo['author'] }}" />
<meta name="publisher" content="{{ $seo['publisher'] }}" />
<meta name="copyright" content="{{ $seo['copyright'] }}" />
<meta name="language" content="{{ $seo['language'] }}" />
<meta name="application-name" content="{{ $seo['application_name'] }}" />
<meta name="robots" content="{{ $seo['robots'] }}" />
<meta name="googlebot" content="{{ $seo['googlebot'] }}" />
<meta name="theme-color" content="{{ $seo['theme_color'] }}" />
<meta name="color-scheme" content="dark light" />
<meta name="format-detection" content="telephone=yes, email=yes, address=no" />
<meta name="referrer" content="strict-origin-when-cross-origin" />
<meta name="geo.region" content="{{ $seo['geo_region'] }}" />
<meta name="geo.placename" content="{{ $seo['geo_placename'] }}" />

<link rel="canonical" href="{{ $seo['canonical'] }}" />
<link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
<link rel="apple-touch-icon" href="{{ asset('assets/img/logo/logo.png') }}" />

<meta property="og:type" content="{{ $seo['type'] }}" />
<meta property="og:locale" content="{{ $seo['locale'] }}" />
<meta property="og:site_name" content="{{ $seo['site_name'] }}" />
<meta property="og:title" content="{{ $seo['title'] }}" />
<meta property="og:description" content="{{ $seo['description'] }}" />
<meta property="og:url" content="{{ $seo['canonical'] }}" />
<meta property="og:image" content="{{ $seo['image'] }}" />
<meta property="og:image:secure_url" content="{{ $seo['image'] }}" />
<meta property="og:image:alt" content="{{ $seo['image_alt'] }}" />

<meta name="twitter:card" content="{{ $seo['twitter_card'] }}" />
<meta name="twitter:title" content="{{ $seo['title'] }}" />
<meta name="twitter:description" content="{{ $seo['description'] }}" />
<meta name="twitter:url" content="{{ $seo['canonical'] }}" />
<meta name="twitter:image" content="{{ $seo['image'] }}" />
<meta name="twitter:image:alt" content="{{ $seo['image_alt'] }}" />

@foreach ($structuredData as $schema)
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endforeach

@stack('meta')
