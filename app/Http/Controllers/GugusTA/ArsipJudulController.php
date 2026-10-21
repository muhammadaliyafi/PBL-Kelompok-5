<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use App\Models\ArsipJudul;
use Illuminate\Http\Request;
use App\Imports\ArsipJudulImport;
use Maatwebsite\Excel\Facades\Excel;

class ArsipJudulController extends Controller
{
    public function index(Request $request)
    {
        // 1. Buat daftar tahun dinamis dari DB + otomatis rentang 2021 sampai tahun depan
        $tahunDiDb = ArsipJudul::select('tahun')->distinct()->pluck('tahun')->toArray();
        $tahunOtomatis = range(2021, (int) date('Y') + 1);
        $daftarTahun = array_unique(array_merge($tahunDiDb, $tahunOtomatis));
        rsort($daftarTahun);

        $query = ArsipJudul::query();

        // 2. Filter pencarian (Judul, Nama, NIM, Topik)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('nim', 'like', "%{$search}%")
                    ->orWhere('topik', 'like', "%{$search}%");
            });
        }

        // 3. Filter Tahun
        if ($request->filled('tahun') && $request->tahun != 'semua') {
            $query->where('tahun', $request->tahun);
        }

        $arsips = $query->orderBy('tahun', 'desc')->get();
        $totalJudul = ArsipJudul::count();

        // Pass variabel $arsips, $totalJudul, dan $daftarTahun ke view
        return view('gugusta.arsip', compact('arsips', 'totalJudul', 'daftarTahun'));
    }

    public function destroy($id)
    {
        $arsip = ArsipJudul::findOrFail($id);
        $arsip->delete();

        return redirect()->back()->with('success', 'Data arsip berhasil dihapus!');
    }

    public function deleteAll()
    {
        ArsipJudul::truncate();

        return redirect()->back()->with('success', 'Semua data arsip judul berhasil dihapus!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new ArsipJudulImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data arsip judul berhasil di-import!');
    }
}
