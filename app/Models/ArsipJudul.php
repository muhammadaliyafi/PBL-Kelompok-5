<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipJudul extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'arsip_juduls';

    // Daftar kolom yang diizinkan untuk mass-assignment / import
    protected $fillable = [
        'tahun',
        'nim',
        'nama',
        'topik',
        'judul', // Field ini yang sebelumnya ketinggalan, Pay!
    ];
}
