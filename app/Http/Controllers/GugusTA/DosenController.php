<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DosenController extends Controller
{
    // Tampilkan Halaman Daftar Dosen
    public function index(Request $request)
    {
        $query = User::where('role', 'dosen');

        // Pencarian jika ada input search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('keahlian', 'like', "%{$search}%");
            });
        }

        // Ambil data dosen
        $dosens = $query->latest()->get();

        // Menyesuaikan folder view ke gugusta.dosen.index atau gugus-ta.dosen.index
        if (view()->exists('gugusta.dosen.index')) {
            return view('gugusta.dosen.index', compact('dosens'));
        }

        return view('gugus-ta.dosen.index', compact('dosens'));
    }

    // Simpan Data Dosen Baru
    public function store(Request $request)
    {
        $request->validate([
            'nip'      => 'required',
            'name'     => 'required',
            'keahlian' => 'required',
        ]);

        $emailDefault = strtolower(str_replace(' ', '', $request->name)) . '@politala.ac.id';

        User::create([
            'nip'      => $request->nip,
            'name'     => $request->name,
            'keahlian' => $request->keahlian,
            'email'    => $request->email ?? $emailDefault,
            'role'     => 'dosen',
            'password' => bcrypt('password123'),
        ]);

        return redirect()->back()->with('success', 'Data Dosen berhasil disimpan!');
    }

    // Update Data Dosen
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip'      => 'required',
            'name'     => 'required',
            'keahlian' => 'required',
        ]);

        $dosen = User::findOrFail($id);
        $dosen->update([
            'nip'      => $request->nip,
            'name'     => $request->name,
            'keahlian' => $request->keahlian,
        ]);

        return redirect()->back()->with('success', 'Data Dosen berhasil diperbarui!');
    }

    // Hapus Data Dosen
    public function destroy($id)
    {
        $dosen = User::findOrFail($id);
        $dosen->delete();

        return redirect()->back()->with('success', 'Data Dosen berhasil dihapus!');
    }
}