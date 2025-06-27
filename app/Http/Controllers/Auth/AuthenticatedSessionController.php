<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman/view login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Menangani permintaan login yang masuk.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Mencoba untuk mengautentikasi user
        $request->authenticate();

        // Membuat session baru
        $request->session()->regenerate();

        // Arahkan ke halaman yang dituju sebelumnya atau ke dashboard
        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    /**
     * Menghancurkan session (logout).
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Arahkan ke halaman utama
        return redirect('/');
    }
}
