<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    // 1. Menampilkan halaman form (Create)
    public function create()
    {
        return view('pengajuan.create');
    }

    // 2. Menerima data dari form dan menyimpan ke database (Store)
    public function store(Request $request)
    {
        // Validasi biar mahasiswa nggak ngirim data kosong
        $request->validate([
            'topik' => 'required',
            'judul_proposal' => 'required|max:255',
            'deskripsi' => 'required'
        ]);

        // Proses simpan ke database
        Pengajuan::create([
            'topik' => $request->topik,
            'judul_proposal' => $request->judul_proposal,
            'deskripsi' => $request->deskripsi,
            'status' => 'Draft' // Otomatis Draft, dosen lu pasti seneng logikanya bener
        ]);

        // Alihkan kembali ke halaman utama bawa pesan sukses
        return redirect()->route('pengajuan.index')->with('success', 'Judul Proposal berhasil diajukan!');
    }
}
