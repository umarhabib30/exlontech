@php
    $seo = \App\Support\SeoMeta::make($meta ?? [], $title ?? null);
    $structuredData = \App\Support\SeoMeta::graphs($seo);
    $llmsUrl = rtrim(\App\Support\SeoMeta::siteUrl(), '/') . '/llms.txt';
    $imageType = str_ends_with(strtolower(parse_url($seo['image'], PHP_URL_PATH) ?: $seo['image']), '.png')
        ? 'image/png'
        : 'image/jpeg';
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
<meta name="geo.position" content="{{ $seo['geo_position'] }}" />
<meta name="ICBM" content="{{ $seo['icbm'] }}" />

<link rel="canonical" href="{{ $seo['canonical'] }}" />
<link rel="alternate" type="text/plain" title="LLM information" href="{{ $llmsUrl }}" />
<link rel="icon" type="image/x-icon" href="{{ public_asset('assets/favicon.ico') }}" />
<link rel="apple-touch-icon" href="{{ public_asset('assets/img/logo/logo.png') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com" />
<link rel="dns-prefetch" href="https://cdn.jsdelivr.net" />

<meta property="og:type" content="{{ $seo['type'] }}" />
<meta property="og:locale" content="{{ $seo['locale'] }}" />
<meta property="og:site_name" content="{{ $seo['site_name'] }}" />
<meta property="og:title" content="{{ $seo['title'] }}" />
<meta property="og:description" content="{{ $seo['description'] }}" />
<meta property="og:url" content="{{ $seo['canonical'] }}" />
<meta property="og:image" content="{{ $seo['image'] }}" />
<meta property="og:image:secure_url" content="{{ $seo['image'] }}" />
<meta property="og:image:alt" content="{{ $seo['image_alt'] }}" />
<meta property="og:image:type" content="{{ $imageType }}" />
<meta property="og:image:width" content="{{ $seo['image_width'] }}" />
<meta property="og:image:height" content="{{ $seo['image_height'] }}" />

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
