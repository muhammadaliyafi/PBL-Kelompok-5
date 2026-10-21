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
        // Validasi file
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:5120',
        ]);

        $file = $request->file('file');

        // Buka file
        $handle = fopen($file->getRealPath(), 'r');

        if (!$handle) {
            return redirect()
                ->route('dosen.arsip')
                ->with('error', 'File CSV tidak dapat dibaca.');
        }

        /*
        |--------------------------------------------------------------------------
        | Membaca baris pertama
        |--------------------------------------------------------------------------
        */

        $firstRow = fgets($handle);

        if ($firstRow === false) {
            fclose($handle);

            return redirect()
                ->route('dosen.arsip')
                ->with('error', 'File CSV kosong.');
        }

        /*
        |--------------------------------------------------------------------------
        | Menentukan pemisah CSV
        |--------------------------------------------------------------------------
        | Jika ada koma digunakan koma.
        | Jika ada titik koma digunakan titik koma.
        |--------------------------------------------------------------------------
        */

        if (substr_count($firstRow, ';') > substr_count($firstRow, ',')) {
            $delimiter = ';';
        } else {
            $delimiter = ',';
        }

        /*
        |--------------------------------------------------------------------------
        | Kembali ke awal file
        |--------------------------------------------------------------------------
        */

        rewind($handle);

        // Baca header
        $header = fgetcsv($handle, 1000, $delimiter);

        $jumlahData = 0;

        /*
        |--------------------------------------------------------------------------
        | Membaca isi CSV
        |--------------------------------------------------------------------------
        */

        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {

            // Lewati baris kosong
            if (empty($row)) {
                continue;
            }

            // Pastikan memiliki minimal 5 kolom
            if (count($row) < 5) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Simpan ke database
            |--------------------------------------------------------------------------
            */

            ArsipJudul::create([
                'tahun' => trim($row[0]),
                'nim' => trim($row[1]),
                'nama' => trim($row[2]),
                'judul_proposal' => trim($row[3]),
                'topik' => trim($row[4]),
            ]);

            $jumlahData++;
        }

        fclose($handle);

        /*
        |--------------------------------------------------------------------------
        | Kembali ke halaman arsip
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('dosen.arsip')
            ->with(
                'success',
                $jumlahData . ' data berhasil diimport ke Data Arsip.'
            );
    }
}