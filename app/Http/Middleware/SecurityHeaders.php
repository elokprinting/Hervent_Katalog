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

        $csp = [
            "default-src 'self'",
            "base-uri 'self'",
            "form-action 'self' https://wa.me https://api.whatsapp.com",
            "object-src 'none'",
            "img-src 'self' data: https: https://www.googletagmanager.com https://*.google-analytics.com https://*.google.com https://*.googleadservices.com https://*.doubleclick.net",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://tagassistant.google.com",
            "font-src 'self' data: https://fonts.gstatic.com",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.googletagmanager.com https://tagassistant.google.com https://www.googleadservices.com https://googleads.g.doubleclick.net",
            "connect-src 'self' https://*.googletagmanager.com https://*.google-analytics.com https://*.analytics.google.com https://*.google.com https://*.googleadservices.com https://*.doubleclick.net https://tagassistant.google.com",
            "frame-src 'self' https://www.googletagmanager.com https://tagassistant.google.com https://td.doubleclick.net",
        ];

        $response->headers->set('Content-Security-Policy', implode('; ', $csp));
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=(), usb=()');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        if ($request->isSecure() || $request->getHost() === 'localhost') {
            $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin-allow-popups');
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        return $response;
    }
}
