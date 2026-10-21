<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Ini field yang boleh diisi sama form input lu
    protected $fillable = [
        'topik',
        'judul_proposal',
        'deskripsi',
        'status'
    ];
}
