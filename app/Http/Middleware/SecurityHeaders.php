<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Remove X-Powered-By header to hide PHP version
        $response->headers->remove('X-Powered-By');

        // Prevent clickjacking attacks
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Prevent MIME type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Content Security Policy - Allow same origin and external resources
        $response->headers->set('Content-Security-Policy',
            "default-src 'self'; " .
            "script-src 'self' 'unsafe-inline' 'unsafe-eval'; " .
            "style-src 'self' 'unsafe-inline' https:; " .
            "img-src 'self' data: https: http:; " .
            "font-src 'self' data: https:; " .
            "frame-src 'self' https://www.google.com; " .
            "connect-src 'self'"
        );

        // Permissions Policy (formerly Feature Policy)
        $response->headers->set('Permissions-Policy',
            'geolocation=(), microphone=(), camera=()'
        );

        // Referrer Policy - Don't leak URLs to external sites
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Note: Spectre mitigation headers (COEP, COOP, CORP) are disabled
        // as they can break external resources. Enable in production if needed.

        return $response;
    }
}
