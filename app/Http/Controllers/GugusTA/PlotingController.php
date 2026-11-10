<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ploting;
use Illuminate\Http\Request;

class PlotingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data mahasiswa (HANYA role mahasiswa) & dosen untuk dropdown
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        $dosens     = User::where('role', 'dosen')->get();

        // Ambil data ploting beserta relasi mahasiswa & dosen
        $query = Ploting::with(['mahasiswa', 'dospem']);

        // Fitur Cari (Ubah 'name' ke 'nama')
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('mahasiswa', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nim', 'like', "%{$search}%");
            })->orWhereHas('dospem', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%");
            });
        }

        $plotings = $query->latest()->get();

        if (view()->exists('gugusta.ploting.index')) {
            return view('gugusta.ploting.index', compact('mahasiswas', 'dosens', 'plotings'));
        }

        return view('gugusta.ploting', compact('mahasiswas', 'dosens', 'plotings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:users,id',
            'dospem_id'    => 'required|exists:users,id',
        ], [
            'mahasiswa_id.required' => 'Silakan pilih mahasiswa!',
            'dospem_id.required'    => 'Silakan pilih dosen pembimbing!',
        ]);

        // Cek apakah mahasiswa ini sudah di-ploting sebelumnya
        $exists = Ploting::where('mahasiswa_id', $request->mahasiswa_id)->first();
        if ($exists) {
            return redirect()->back()->with('error', 'Mahasiswa ini sudah memiliki ploting Dospem!');
        }

        Ploting::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'dospem_id'    => $request->dospem_id,
            'status'       => 'Menunggu',
        ]);

        return redirect()->back()->with('success', 'Ploting Dospem berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dospem_id' => 'required|exists:users,id',
            'status'    => 'required|in:Menunggu,Disetujui,Ditolak',
        ]);

        $ploting = Ploting::findOrFail($id);
        $ploting->update([
            'dospem_id' => $request->dospem_id,
            'status'    => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data ploting berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ploting = Ploting::findOrFail($id);
        $ploting->delete();

        return redirect()->back()->with('success', 'Data ploting berhasil dihapus!');
    }
}
