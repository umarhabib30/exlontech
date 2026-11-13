<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only advertise HSTS over a real TLS connection. Sending it on plain
        // HTTP is ignored by browsers, and sending it from local dev would
        // pin developers' browsers to https://localhost.
        // "preload" is deliberately omitted: submitting to the browser preload
        // list is effectively irreversible and would hard-fail every
        // exlontech.com subdomain that ever loses a valid certificate.
        if ($request->secure()) {
            $response->headers->set(
                'Strict-Transport-Security',
                'max-age=31536000; includeSubDomains',
                false
            );
        }

        $response->headers->set('X-Content-Type-Options', 'nosniff', false);
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin', false);

        return $response;
    }
}
