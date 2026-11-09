<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input email dan password (NIM)
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Pastikan role yang masuk adalah mahasiswa
            if (Auth::user()->role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Akses khusus untuk Mahasiswa.']);
        }

        return back()->withErrors([
            'email' => 'Email kampus atau NIM (Password) salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}