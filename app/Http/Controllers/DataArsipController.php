<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataArsipController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil inputan filter dari halaman
        $search = $request->input('search');
        $topik  = $request->input('topik');
        $tahun  = $request->input('tahun');

        // Query Dasar
        $query = DB::table('arsip_juduls');

        // Filter Pencarian (Nama, NIM, atau Judul)
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%')
                    ->orWhere('nim', 'like', '%' . $search . '%');
            });
        }

        // Filter Dropdown Topik
        if (!empty($topik)) {
            $query->where('topik', $topik);
        }

        // Filter Dropdown Tahun
        if (!empty($tahun)) {
            $query->where('tahun', $tahun);
        }

        // Ambil data hasil filter dengan urutan terbaru
        $arsip = $query->orderBy('tahun', 'desc')->paginate(10);

        // Ambil list unik Topik dan Tahun untuk dropdown filter
        $list_topik = DB::table('arsip_juduls')->distinct()->pluck('topik');
        $list_tahun = DB::table('arsip_juduls')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        // Total Statistik Ringkas
        $total_arsip = DB::table('arsip_juduls')->count();

        return view('data_arsip', compact('arsip', 'list_topik', 'list_tahun', 'total_arsip'));
    }
}
