<?php

namespace App\Http\Controllers;

use App\Models\ArsipJudul;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = ArsipJudul::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nim', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('judul_proposal', 'like', "%{$search}%")
                    ->orWhere('topik', 'like', "%{$search}%");
            });
        }

        // Filter tahun
        if ($request->filled('tahun') && $request->tahun !== 'semua') {
            $query->where('tahun', $request->tahun);
        }

        $arsip = $query
            ->orderBy('tahun', 'desc')
            ->orderBy('nama')
            ->get();

        return view('pages.arsip', compact('arsip'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:5120',
        ]);

        $file = $request->file('file');

        $handle = fopen($file->getRealPath(), 'r');

        // Ambil baris pertama sebagai header
        $header = fgetcsv($handle);

        while (($row = fgetcsv($handle)) !== false) {

            if (count($row) < 5) {
                continue;
            }

            ArsipJudul::create([
                'tahun' => $row[0],
                'nim' => $row[1],
                'nama' => $row[2],
                'judul_proposal' => $row[3],
                'topik' => $row[4],
            ]);
        }

        fclose($handle);

        return redirect()
            ->route('dosen.arsip')
            ->with('success', 'Data CSV berhasil diimport.');
    }
}