<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTopik extends Model
{
    use HasFactory;

    protected $table = 'bank_topiks';

    protected $fillable = [
        'kode_topik',
        'nama_topik',
        'deskripsi',
        'status',
    ];
}
