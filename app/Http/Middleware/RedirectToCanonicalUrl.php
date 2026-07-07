<?php

namespace App\Http\Middleware;

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

        $path = $request->getPathInfo();

        // Only normalize a trailing slash on non-root paths. Everything else
        // (scheme/host) is left to the web server / APP_URL so we never fight
        // a reverse proxy and cause a redirect loop.
        if ($path === '/' || ! str_ends_with($path, '/')) {
            return $next($request);
        }

        $normalizedPath = rtrim($path, '/');

        if ($normalizedPath === '') {
            return $next($request);
        }

        $target = $request->getSchemeAndHttpHost() . $normalizedPath;

        if ($query = $request->getQueryString()) {
            $target .= '?' . $query;
        }

        if ($target === $request->fullUrl()) {
            return $next($request);
        }

        return redirect()->to($target, 301);
    }
}
