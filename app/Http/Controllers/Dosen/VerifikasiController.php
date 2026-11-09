<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\PengajuanJudul;

class VerifikasiController extends Controller
{
    public function index()
    {
        $proposals = PengajuanJudul::with('user')
            ->latest()
            ->get();

        return view('pages.validasi', compact('proposals'));
    }
}
