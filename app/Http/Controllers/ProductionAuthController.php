<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class ProductionAuthController extends Controller
{
    /**
     * Tampilkan halaman login production
     */
    public function showLogin()
    {
        // Jika sudah login, langsung redirect ke editor
        if (session('production_authenticated')) {
            return redirect()->route('production.blog.index');
        }
        return view('production.login');
    }

    /**
     * Proses login production
     */
    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'max:255'],
        ]);

        $key = 'production-login:'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()->withErrors([
                'password' => "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik.",
            ]);
        }

        $passwordHash = config('production.password_hash');

        if (is_string($passwordHash) && $passwordHash !== '' && Hash::check($request->string('password')->toString(), $passwordHash)) {
            $request->session()->regenerate();
            $request->session()->put('production_authenticated', true);
            RateLimiter::clear($key);

            return redirect()->route('production.blog.index')
                ->with('success', 'Selamat datang di area produksi!');
        }

        RateLimiter::hit($key, 300);

        return back()->withErrors(['password' => 'Password salah. Silakan coba lagi.']);
    }

    /**
     * Logout dari area production
     */
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('production.login')
            ->with('info', 'Anda telah logout dari area produksi.');
    }
}
