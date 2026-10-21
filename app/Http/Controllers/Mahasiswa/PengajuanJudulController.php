<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanJudulController extends Controller
{
    public function index()
    {
        $isSubmitted = session('judul_submitted', false);
        $dataJudul = session('data_judul', null);

        return view('mahasiswa.pengajuanjudul', compact('isSubmitted', 'dataJudul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_usulan' => 'required|string',
            'deskripsi'    => 'required|string',
        ]);

        $data = (object) [
            'topik'             => 'Sistem Informasi Terintegrasi',
            'judul'             => $request->judul_usulan,
            'deskripsi'         => $request->deskripsi,
            'tanggal_pengajuan' => now()->translatedFormat('d F Y'),
        ];

        $request->session()->flash('judul_submitted', true);
        $request->session()->flash('data_judul', $data);

        return redirect()->route('mahasiswa.judul.index');
    }
}