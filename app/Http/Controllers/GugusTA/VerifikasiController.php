<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;

class VerifikasiController extends Controller
{
    public function index()
    {
        // Ambil semua data proposal dari database
        $proposals = \App\Models\Proposal::all();

        // Kirim datanya ke halaman HTML (view)
        return view('gugusta.verifikasi', compact('proposals'));
    }

    public function review($id)
    {
        // Nanti data mahasiswa diambil berdasarkan $id dari database
        return view('gugusta.review');
    }

    public function updateReview(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        // SEKARANG BAGIAN INI AKTIF!
        $proposal = Proposal::findOrFail($id);
        $proposal->update([
            'status' => $request->status,
            'catatan_gugus_ta' => $request->catatan
        ]);

        return redirect()->route('gugusta.verifikasi')
            ->with('success', 'Keputusan verifikasi proposal berhasil disimpan!');
    }
};
