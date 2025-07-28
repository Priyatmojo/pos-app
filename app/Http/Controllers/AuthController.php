<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses otentikasi user.
     */
    public function login(Request $request)
    {
        // Ganti validasi dari 'email' menjadi 'username'
        $credentials = $request->validate([
            'username' => 'required|string', // <-- Ubah ini
            'password' => 'required',
        ]);

        // Ganti 'email' menjadi 'username' saat mencoba login
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Logika redirect tetap sama
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/admin/dashboard');
                case 'outlet':
                    return redirect()->intended('/outlet/dashboard');
                case 'divisi':
                    return redirect()->intended('/divisi/dashboard');
                default:
                    return redirect('/');
            }
        }

        // Ganti pesan error agar merujuk ke username
        return back()->withErrors([
            'username' => 'Username atau Password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    /**
     * Menangani proses logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
