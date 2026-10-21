<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ploting extends Model
{
    use HasFactory;

    // Daftarkan kolom yang boleh diisi mass-assignment di sini
    protected $fillable = [
        'mahasiswa_id',
        'dospem_id',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function dospem()
    {
        return $this->belongsTo(User::class, 'dospem_id');
    }
}
