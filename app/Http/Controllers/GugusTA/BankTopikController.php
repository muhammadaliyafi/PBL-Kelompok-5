<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use App\Models\BankTopik;
use Illuminate\Http\Request;

class BankTopikController extends Controller
{
    public function index()
    {
        $topiks = BankTopik::orderBy('created_at', 'desc')->get();
        return view('gugusta.topik', compact('topiks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_topik' => 'required|unique:bank_topiks,kode_topik',
            'nama_topik' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
        ]);

        BankTopik::create([
            'kode_topik' => strtoupper($request->kode_topik),
            'nama_topik' => $request->nama_topik,
            'deskripsi'  => $request->deskripsi,
            'status'     => 'Aktif',
        ]);

        return redirect()->back()->with('success', 'Topik baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $topik = BankTopik::findOrFail($id);

        $request->validate([
            'kode_topik' => 'required|unique:bank_topiks,kode_topik,' . $id,
            'nama_topik' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'status'     => 'required|in:Aktif,Nonaktif',
        ]);

        $topik->update([
            'kode_topik' => strtoupper($request->kode_topik),
            'nama_topik' => $request->nama_topik,
            'deskripsi'  => $request->deskripsi,
            'status'     => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data topik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $topik = BankTopik::findOrFail($id);
        $topik->delete();

        return redirect()->back()->with('success', 'Topik berhasil dihapus!');
    }
}
