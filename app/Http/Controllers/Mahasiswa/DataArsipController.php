<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\ArsipJudul; // Model database arsip dari Gugus TA
use Illuminate\Http\Request;

class DataArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = ArsipJudul::query();

        // 1. Filter Pencarian (Judul, Nama, NIM, atau Topik)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('nama_mahasiswa', 'LIKE', "%{$search}%")
                    ->orWhere('nim', 'LIKE', "%{$search}%")
                    ->orWhere('topik', 'LIKE', "%{$search}%");
            });
        }

        // 2. Filter Tahun
        if ($request->filled('year')) {
            $query->where('tahun', $request->year);
        }

        // 3. Ambil data dengan Pagination (10 per halaman)
        $arsipList = $query->latest()->paginate(10)->withQueryString();

        return view('mahasiswa.arsip', compact('arsipList'));
    }
}
