<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;

class VerifikasiController extends Controller
{
    public function index(Request $request)
    {
        // Hitung statistik untuk Stat Cards di atas
        $totalPengajuan = Proposal::count();
        $menungguReview = Proposal::where('status', 'Menunggu')->count();
        $telahDisetujui = Proposal::where('status', 'Disetujui')->count();

        // Query data proposal (beserta relasi mahasiswa)
        $query = Proposal::with('mahasiswa');

        // Fitur Pencarian (Judul, Nama Mahasiswa, atau NIM)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhereHas('mahasiswa', function ($qm) use ($search) {
                        $qm->where('nama', 'like', "%{$search}%")
                            ->orWhere('nim', 'like', "%{$search}%");
                    });
            });
        }

        // Fitur Filter Status (Menunggu, Disetujui, Ditolak)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $proposals = $query->latest()->get();

        return view('gugusta.verifikasi', compact(
            'proposals',
            'totalPengajuan',
            'menungguReview',
            'telahDisetujui'
        ));
    }

    public function review($id)
    {
        $proposal = Proposal::with('mahasiswa')->findOrFail($id);
        return view('gugusta.review', compact('proposal'));
    }

    public function updateReview(Request $request, $id)
    {
        $request->validate([
            'status'  => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $proposal = Proposal::findOrFail($id);
        $proposal->update([
            'status'           => $request->status,
            'catatan_gugus_ta' => $request->catatan,
        ]);

        return redirect()->route('gugusta.verifikasi')
            ->with('success', 'Keputusan verifikasi proposal berhasil disimpan!');
    }
}
