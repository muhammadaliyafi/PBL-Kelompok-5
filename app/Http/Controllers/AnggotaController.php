<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $r)
    {
        $q = $r->query('q');
        $anggota = Anggota::when($q, fn($x) => $x->where('nama', 'like', "%$q%")->orWhere('nim', 'like', "%$q%"))
            ->latest()
            ->paginate(10);

        return view('anggota', compact('anggota', 'q'));
    }

    public function create()
    {
        $anggota = new Anggota();
        return view('anggota-form', compact('anggota'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'nim'   => ['required', 'string', 'max:20', 'unique:anggotas,nim'],
            'nama'  => ['required', 'string', 'max:100'],
            'prodi' => ['required', 'string', 'max:50'],
            'no_hp' => ['required', 'string', 'max:20'],
        ]);

        Anggota::create($data);
        return redirect()->route('anggota.index')->with('ok', 'Anggota berhasil ditambahkan');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota-form', compact('anggota'));
    }

    public function update(Request $r, Anggota $anggota)
    {
        $data = $r->validate([
            'nim'   => ['required', 'string', 'max:20', 'unique:anggotas,nim,' . $anggota->id],
            'nama'  => ['required', 'string', 'max:100'],
            'prodi' => ['required', 'string', 'max:50'],
            'no_hp' => ['required', 'string', 'max:20'],
        ]);

        $anggota->update($data);
        return redirect()->route('anggota.index')->with('ok', 'Data anggota berhasil diperbarui');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return back()->with('ok', 'Anggota berhasil dihapus');
    }
}
