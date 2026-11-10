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

        // Pencarian jika ada input search (Ganti 'name' jadi 'nama')
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('keahlian', 'like', "%{$search}%");
            });
        }

        // Ambil data dosen
        $dosens = $query->latest()->get();

        if (view()->exists('gugusta.dosen.index')) {
            return view('gugusta.dosen.index', compact('dosens'));
        }

        return view('gugus-ta.dosen.index', compact('dosens'));
    }

    // Simpan Data Dosen Baru
    public function store(Request $request)
    {
        // Validasi NIP: Numeric, Max 18 Digit, Unik di tabel users
        $request->validate([
            'nip'      => 'required|numeric|digits_between:1,18|unique:users,nip',
            'name'     => 'required|string|max:255',
            'keahlian' => 'required|string|max:255',
        ], [
            'nip.required'       => 'NIP Dosen wajib diisi!',
            'nip.numeric'        => 'NIP Dosen harus berupa angka!',
            'nip.digits_between' => 'NIP Dosen maksimal 18 digit angka!',
            'nip.unique'         => 'NIP sudah terdaftar di sistem!',
            'name.required'      => 'Nama Dosen wajib diisi!',
            'keahlian.required'  => 'Bidang Keahlian wajib diisi!',
        ]);

        // Bersihkan nama dari simbol/gelar supaya email kampus bersih (contoh: nindy@politala.ac.id)
        $cleanName = preg_replace('/[^a-zA-Z]/', '', $request->name);
        $emailDefault = strtolower($cleanName) . '@politala.ac.id';

        User::create([
            'nip'      => $request->nip,
            'nama'     => $request->name,     // <-- Diubah dari 'name' ke 'nama' sesuai database
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
            'nip'      => 'required|numeric|digits_between:1,18|unique:users,nip,' . $id,
            'name'     => 'required|string|max:255',
            'keahlian' => 'required|string|max:255',
        ], [
            'nip.required'       => 'NIP Dosen wajib diisi!',
            'nip.numeric'        => 'NIP Dosen harus berupa angka!',
            'nip.digits_between' => 'NIP Dosen maksimal 18 digit angka!',
            'nip.unique'         => 'NIP sudah terdaftar di sistem!',
            'name.required'      => 'Nama Dosen wajib diisi!',
            'keahlian.required'  => 'Bidang Keahlian wajib diisi!',
        ]);

        $dosen = User::findOrFail($id);
        $dosen->update([
            'nip'      => $request->nip,
            'nama'     => $request->name,     // <-- Diubah dari 'name' ke 'nama'
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
