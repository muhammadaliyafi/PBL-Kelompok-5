<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    // Tambahkan baris ini biar datanya bisa disimpan
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'judul',
        'file_proposal',
        'status',
        'catatan_gugus_ta'
    ];
}
