<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use App\Models\User; // Manggil model User (database mahasiswa lu)
use Illuminate\Http\Request;

class PlotingController extends Controller
{
    public function index()
    {
        // Narik semua data user yang punya 'tahun_angkatan' (asumsi ini mahasiswa)
        $mahasiswas = User::whereNotNull('tahun_angkatan')->get();

        // Ngirim datanya ke halaman UI ploting
        return view('gugusta.ploting', compact('mahasiswas'));
    }
}
