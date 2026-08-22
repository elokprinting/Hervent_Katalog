<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionAuthController extends Controller
{
    // Password untuk akses area production
    // Ganti nilai ini sesuai kebutuhan
    const PASSWORD = 'hervent2026';

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
            'password' => 'required',
        ]);

        if ($request->password === self::PASSWORD) {
            session(['production_authenticated' => true]);
            return redirect()->route('production.blog.index')
                ->with('success', 'Selamat datang di area produksi!');
        }

        return back()->withErrors(['password' => 'Password salah. Silakan coba lagi.']);
    }

    /**
     * Logout dari area production
     */
    public function logout()
    {
        session()->forget('production_authenticated');
        return redirect()->route('production.login')
            ->with('info', 'Anda telah logout dari area produksi.');
    }
}
