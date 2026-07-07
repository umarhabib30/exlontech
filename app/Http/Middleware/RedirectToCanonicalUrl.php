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
        if ($request->isMethodCacheable()) {
            $currentUrl = $request->fullUrl();
            $canonicalUrl = SeoMeta::canonicalUrl($currentUrl);

            if ($currentUrl !== $canonicalUrl) {
                return redirect()->to($canonicalUrl, 301);
            }
        }

        return $next($request);
    }
}
