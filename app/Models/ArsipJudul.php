<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipJudul extends Model
{
    use HasFactory;

    protected $table = 'arsip_juduls';

    protected $fillable = [
        'tahun',
        'nim',
        'nama',
        'judul',
        'topik',
    ];
}
