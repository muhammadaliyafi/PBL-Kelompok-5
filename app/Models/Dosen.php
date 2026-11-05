<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'users'; // Karena kolom NIP & Keahlian ditambahkan ke tabel users
}
