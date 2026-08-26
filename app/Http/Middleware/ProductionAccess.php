<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductionAccess
{
    /**
     * Handle an incoming request.
     * Cek apakah user sudah terautentikasi untuk area production.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('production_authenticated') !== true) {
            return redirect()->route('production.login');
        }

        return $next($request);
    }
}
