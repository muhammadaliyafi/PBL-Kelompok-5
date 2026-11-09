<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    // 1. Mengarahkan pengguna ke halaman OAuth Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Menerima data kembalian (callback) dari Google
    public function handleGoogleCallback()
    {
        try {
            /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
            $driver = Socialite::driver('google');
            $googleUser = $driver->stateless()->user();
            $email = $googleUser->email;

            // VALIDASI DOMAIN KAMPUS
            if (!str_ends_with($email, '@mhs.politala.ac.id') && !str_ends_with($email, '@politala.ac.id')) {
                return redirect()->route('login')->with('error', 'Akses ditolak! Silakan gunakan email resmi kampus (@mhs.politala.ac.id).');
            }

            // OTOMATIS PISAHKAN NIM & NAMA (jika nama diawali angka seperti "2501301043 LAILA RAMADHANI")
            $rawName = trim($googleUser->name);
            $nim = '-';
            $cleanName = $rawName;

            if (preg_match('/^(\d+)\s+(.+)$/', $rawName, $matches)) {
                $nim = $matches[1]; // Ambil angka NIM
                $cleanName = ucwords(strtolower($matches[2])); // Ubah teks jadi "Laila Ramadhani"
            }

            // Pengecekan user di database
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $email)
                        ->first();

            if ($user) {
                // Perbarui data user lama agar NIM dan Namanya ikut rapi
                $user->update([
                    'google_id' => $googleUser->id,
                    'nama'      => $cleanName,
                    'name'      => $cleanName,
                    'nim'       => $user->nim === '-' || empty($user->nim) ? $nim : $user->nim,
                ]);
            } else {
                // Daftarkan user baru dengan NIM dan Nama bersih
                $user = User::create([
                    'nama'      => $cleanName,
                    'name'      => $cleanName,
                    'email'     => $email,
                    'google_id' => $googleUser->id,
                    'role'      => 'mahasiswa',
                    'nim'       => $nim,
                    'password'  => bcrypt(str()->random(16)),
                ]);
            }

            // Aktifkan Session Login
            Auth::login($user);

            // Arahkan ke dashboard sesuai role
            if ($user->role === 'dospem') {
                return redirect()->route('dospem.validasi-judul');
            }

            return redirect()->route('mahasiswa.dashboard');

        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal masuk menggunakan akun Google: ' . $e->getMessage());
        }
    }
}