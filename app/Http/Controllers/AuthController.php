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

    // 2. Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $input = strtolower($request->input('username'));

        // A. CEK JIKA USER ADALAH MAHASISWA
        if (str_contains($input, 'mhs') || preg_match('/^[0-9]{8,12}$/', $input)) {
            session(['active_role' => 'mahasiswa']);
            return redirect()->intended('/mahasiswa/dashboard');
        }

        // B. KONDISI KHUSUS DOSEN

        // 1. Ibu Nina Mia Aristi -> Dosen Pembimbing & Gugus TA
        if (str_contains($input, 'nina') || str_contains($input, '199008262022032002')) {
            session([
                'user_roles' => ['dospem', 'gugus_ta'],
                'user_name'  => 'Nina Mia Aristi, M.Kom'
            ]);
            return redirect()->route('select.role');
        }

        // 2. Pak Aidil Fajar Zulfahri -> Dosen Pembimbing & Koorprodi
        if (str_contains($input, 'aidil') || str_contains($input, '199405132022031005')) {
            session([
                'user_roles' => ['dospem', 'koorprodi'],
                'user_name'  => 'Aidil Fajar Zulfahri, S.Kom., M.Kom'
            ]);
            return redirect()->route('select.role');
        }

        // 3. Dosen Lainnya (Dwi Agung, Nindy, Sausan, dll) -> Langsung Dosen Pembimbing
        session(['active_role' => 'dospem']);
        return redirect()->intended('/dosen/dashboard');
    }

    // 3. Tampilkan Halaman Pilih Role (Khusus Dosen dengan Role > 1)
    public function showSelectRole()
    {
        if (!session()->has('user_roles')) {
            return redirect('/login');
        }

        return view('auth.select-role');
    }

    // 4. Set Role yang Dipilih ke Session
    public function setRole(Request $request)
    {
        $role = $request->input('role');
        session(['active_role' => $role]);

        switch ($role) {
            case 'gugus_ta':
                return redirect('/gugus-ta/dosen');
            case 'dospem':
                return redirect('/dosen/dashboard');
            case 'koorprodi':
                return redirect('/koorprodi/dashboard');
            default:
                return redirect('/dosen/dashboard');
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
