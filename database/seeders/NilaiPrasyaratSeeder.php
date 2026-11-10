<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class NilaiPrasyaratSeeder extends Seeder
{
    public function run(): void
    {
        // Cari user spesifik berdasarkan email login kamu (atau ganti dengan email kamu yang ada di DB)
        $user = User::where('email', 'shelvi@gmail.com')->first() ?? User::first(); 

        if (!$user) {
            return;
        }

        // Hapus data lama milik user ini agar tidak duplikat saat seeder dijalankan ulang
        DB::table('nilai_prasyarats')->where('user_id', $user->id)->delete();

        $now = now();

        // Data Nilai Matkul Pendukung (Persis Rerata PDF: A1=85, A2=90, A3=75, A4=80, A5=88)
        $dataNilai = [
            // Topik A1: Sistem Informasi Terintegrasi (Rerata = 85)
            ['user_id' => $user->id, 'kode_topik' => 'A1', 'nama_matkul' => 'Pemrograman Web', 'nilai' => 85, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A1', 'nama_matkul' => 'Basis Data', 'nilai' => 90, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A1', 'nama_matkul' => 'Analisis & Perancangan Sistem', 'nilai' => 80, 'created_at' => $now, 'updated_at' => $now],

            // Topik A2: Internet of Things (IoT) (Rerata = 90)
            ['user_id' => $user->id, 'kode_topik' => 'A2', 'nama_matkul' => 'Mikroprosesor & Mikrokontroler', 'nilai' => 92, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A2', 'nama_matkul' => 'Jaringan Komputer', 'nilai' => 88, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A2', 'nama_matkul' => 'Sistem Terdistribusi', 'nilai' => 90, 'created_at' => $now, 'updated_at' => $now],

            // Topik A3: Pengembangan Game (Rerata = 75)
            ['user_id' => $user->id, 'kode_topik' => 'A3', 'nama_matkul' => 'Pemrograman Berorientasi Objek', 'nilai' => 75, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A3', 'nama_matkul' => 'Grafika Komputer', 'nilai' => 70, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A3', 'nama_matkul' => 'Pemrograman Game', 'nilai' => 80, 'created_at' => $now, 'updated_at' => $now],

            // Topik A4: AR / VR (Rerata = 80)
            ['user_id' => $user->id, 'kode_topik' => 'A4', 'nama_matkul' => 'Pengolahan Citra Digital', 'nilai' => 80, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A4', 'nama_matkul' => 'Grafika Komputer', 'nilai' => 78, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A4', 'nama_matkul' => 'Teknologi Multimedia', 'nilai' => 82, 'created_at' => $now, 'updated_at' => $now],

            // Topik A5: Data Mining / SPK (Rerata = 88)
            ['user_id' => $user->id, 'kode_topik' => 'A5', 'nama_matkul' => 'Algoritma & Struktur Data', 'nilai' => 86, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A5', 'nama_matkul' => 'Sistem Basis Data Lanjut', 'nilai' => 90, 'created_at' => $now, 'updated_at' => $now],
            ['user_id' => $user->id, 'kode_topik' => 'A5', 'nama_matkul' => 'Probabilitas & Statistik', 'nilai' => 88, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('nilai_prasyarats')->insert($dataNilai);
    }
}