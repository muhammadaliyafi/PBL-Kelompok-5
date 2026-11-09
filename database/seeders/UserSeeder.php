<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nim' => '2501301050',
            'email' => 'shelviayusetyowati25@mhs.politala.ac.id',
            'nama' => 'Shelvi Ayu Setyowati',
            'prodi' => 'Teknologi Informasi',
            'jurusan' => 'Komputer dan Bisnis',
            'angkatan' => 2025,
            'password' => Hash::make('2501301050'), // Password diisi NIM & di-hash
            'role' => 'mahasiswa',
        ]);
    }
}