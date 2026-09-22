<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuController extends Controller
{
    public function index(Request $r)
    {
        $q = $r->query('q');
        $buku = buku::when($q, fn($x) => $x->where('judul', 'like', "%$q%"))
            ->latest()->paginate(10);
        return view('buku', compact('buku', 'q')); // pakai view 'buku.blade.php'
    }

    public function create()
    {
        $buku = new buku(); // kosong - untuk form gabungan
        return view('buku-form', compact('buku')); // 'buku-form.blade.php'
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'judul'   => ['required', 'string', 'max:150'],
            'penulis' => ['required', 'string', 'max:100'],
            'tahun'   => ['required', 'integer', 'between:1900,' . date('Y')],
            'stok'    => ['required', 'integer', 'min:0'],
        ]);
        buku::create($data);
        return redirect()->route('buku.index')->with('ok', 'Buku ditambahkan');
    }

    public function edit(buku $buku)
    {
        return view('buku-form', compact('buku'));
    }

    public function update(Request $r, buku $buku)
    {
        $data = $r->validate([
            'judul'   => ['required', 'string', 'max:150'],
            'penulis' => ['required', 'string', 'max:100'],
            'tahun'   => ['required', 'integer', 'between:1900,' . date('Y')],
            'stok'    => ['required', 'integer', 'min:0'],
        ]);
        $buku->update($data);
        return redirect()->route('buku.index')->with('ok', 'Buku diupdate');
    }

    public function destroy(buku $buku)
    {
        $buku->delete();
        return back()->with('ok', 'Buku dihapus');
    }
}
