<?php

namespace App\Http\Middleware;

use App\Support\SeoMeta;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToCanonicalUrl
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return $next($request);
        }

        $host = $this->canonicalHost($request);
        $path = $this->canonicalPath($request);

        if ($host === null && $path === null) {
            return $next($request);
        }

        $target = $request->getScheme() . '://'
            . ($host ?? $request->getHttpHost())
            . ($path ?? $request->getPathInfo());

        if ($query = $request->getQueryString()) {
            $target .= '?' . $query;
        }

        if ($target === $request->fullUrl()) {
            return $next($request);
        }

        return redirect()->to($target, 301);
    }

    /**
     * Serving the same page on www and non-www makes every page look like
     * duplicate content to crawlers, so collapse onto the configured host.
     * Only the www/non-www pair is redirected; any other host (local domains,
     * preview subdomains, a reverse proxy) is left alone to avoid loops.
     */
    private function canonicalHost(Request $request): ?string
    {
        $canonical = parse_url(SeoMeta::siteUrl(), PHP_URL_HOST);

        if (! $canonical) {
            return null;
        }

        $current = strtolower($request->getHost());

        if ($current === $canonical) {
            return null;
        }

        $isWwwVariant = $current === 'www.' . $canonical || 'www.' . $current === $canonical;

        if (! $isWwwVariant) {
            return null;
        }

        $port = $request->getPort();
        $isDefaultPort = in_array([$request->getScheme(), $port], [['http', 80], ['https', 443]], true);

        return $canonical . ($isDefaultPort || ! $port ? '' : ':' . $port);
    }

    private function canonicalPath(Request $request): ?string
    {
        $path = $request->getPathInfo();

        if ($path === '/' || ! str_ends_with($path, '/')) {
            return null;
        }

        $normalized = rtrim($path, '/');

        return $normalized === '' ? null : $normalized;
    }
}
