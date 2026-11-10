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

            // 1. VALIDASI DOMAIN KAMPUS (Dosen & Mahasiswa)
            $isMahasiswa = str_ends_with($email, '@mhs.politala.ac.id');
            $isDosen     = str_ends_with($email, '@politala.ac.id');

            if (!$isMahasiswa && !$isDosen) {
                return redirect()->route('login')->with('error', 'Akses ditolak! Silakan gunakan email resmi kampus Politala.');
            }

            // 2. OTOMATIS PISAHKAN NIM & NAMA KHUSUS MAHASISWA
            $rawName = trim($googleUser->name);
            $nim = '-';
            $cleanName = $rawName;

            if ($isMahasiswa && preg_match('/^(\d+)\s+(.+)$/', $rawName, $matches)) {
                $nim = $matches[1]; // Ambil angka NIM
                $cleanName = ucwords(strtolower($matches[2])); // Format: "Laila Ramadhani"
            }

            // 3. PENGECEKAN USER DI DATABASE
            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $email)
                ->first();

            if ($user) {
                // Perbarui data user jika ada perapihan Google ID / NIM
                $user->update([
                    'google_id' => $googleUser->id,
                    'nama'      => $user->nama ?? $cleanName,
                    'name'      => $user->name ?? $cleanName,
                    'nim'       => ($user->nim === '-' || empty($user->nim)) ? $nim : $user->nim,
                ]);
            } else {
                // 4. DAFTARKAN USER BARU (Role default untuk email dosen baru = 'dospem')
                $role = $isDosen ? 'dospem' : 'mahasiswa';

                $user = User::create([
                    'nama'      => $cleanName,
                    'name'      => $cleanName,
                    'email'     => $email,
                    'google_id' => $googleUser->id,
                    'role'      => $role,
                    'nim'       => $nim,
                    'password'  => bcrypt(str()->random(16)),
                ]);
            }

            // 5. AKTIFKAN SESSION LOGIN
            Auth::login($user);

            // 6. REDIRECT SESUAI ROLE DARI DATABASE
            switch ($user->role) {
                case 'admin':
                case 'gugus_ta':
                    return redirect()->route('gugusta.dashboard');

                case 'koorprodi':
                    return redirect()->route('koorprodi.dashboard');

                case 'dospem':
                case 'dosen':
                    return redirect()->route('dospem.validasi-judul');

                default:
                    return redirect()->route('mahasiswa.dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal masuk menggunakan akun Google: ' . $e->getMessage());
        }
    }
}
