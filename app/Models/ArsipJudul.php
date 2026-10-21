<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipJudul extends Model
{
    protected $fillable = [
        'tahun',
        'nim',
        'nama',
        'judul_proposal',
        'topik',
    ];
}