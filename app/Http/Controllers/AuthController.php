<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // 1. Tampilkan Halaman Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Proses Login (Dummy / Bebas Masuk Tanpa Verifikasi Database)
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $input = strtolower($request->input('username'));

        // Jika diketik email mhs / mengandung NIM (angka) -> langsung ke dashboard Mahasiswa
        if (str_contains($input, 'mhs') || preg_match('/^[0-9]{8,}/', $input)) {
            session(['active_role' => 'mahasiswa']);
            return redirect()->intended('/mahasiswa/dashboard');
        }

        // Jika diketik email dosen / NIP / nama dosen bebas -> langsung arahkan ke Pilih Role
        return redirect()->route('select.role');
    }

    // 3. Tampilkan Halaman Pilih Role (Khusus Dosen/Staf)
    public function showSelectRole()
    {
        return view('auth.select-role');
    }

    // 4. Set Role yang Dipilih ke Session
    public function setRole(Request $request)
    {
        $role = $request->input('role');
        session(['active_role' => $role]);

        switch ($role) {
            case 'gugus_ta':
                return redirect('/gugus-ta/dashboard');
            case 'dospem':
                return redirect('/dosen/dashboard');
            case 'koorprodi':
                return redirect('/koorprodi/dashboard');
            default:
                return redirect('/gugus-ta/dashboard');
        }
    }

    // 5. Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}