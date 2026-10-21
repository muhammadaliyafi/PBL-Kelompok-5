<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanTopikController extends Controller
{
    public function index()
    {
        $isSubmitted = session('success_submit', false);
        $pengajuanTopik = session('pengajuanTopik', null);

        return view('mahasiswa.pengajuantopik', compact('isSubmitted', 'pengajuanTopik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topik_pilihan' => 'required|string',
        ]);

        $dataPengajuan = (object) [
            'topik_pilihan' => $request->topik_pilihan,
            'status'        => 'Menunggu Bimbingan / ACC Dospem',
            'created_at'    => now()
        ];

        // MENGGUNAKAN FLASH SESSION
        // Cuma bertahan 1x request. Kalau berpindah halaman/back browser, otomatis kembali ke form awal
        $request->session()->flash('success_submit', true);
        $request->session()->flash('pengajuanTopik', $dataPengajuan);

        return redirect()->route('mahasiswa.topik.index');
    }
}