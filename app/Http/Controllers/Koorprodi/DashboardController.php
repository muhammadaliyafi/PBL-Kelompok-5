<?php

namespace App\Http\Controllers\Koorprodi;

use App\Http\Controllers\Controller;
use App\Models\User; // Menggunakan Model User bawaan Laravel
use App\Models\ArsipJudul;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung Statistik Dasar dari Tabel Users berdasarkan Role
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalDosen = User::whereIn('role', ['dosen', 'dospem'])->count();
        $avgBeban = $totalDosen > 0 ? round($totalMahasiswa / $totalDosen, 1) : 0;

        // 2. Ambil Topik Paling Diminati dari Database Arsip
        $topikStats = ArsipJudul::select('topik', DB::raw('count(*) as total'))
            ->whereNotNull('topik')
            ->groupBy('topik')
            ->orderByDesc('total')
            ->get();

        $topikTerbanyak = $topikStats->first()->topik ?? 'Belum Ada Data';

        // 3. Data Chart Tren Topik (Donut)
        $chartTopikLabels = $topikStats->pluck('topik')->toArray();
        $chartTopikData = $topikStats->pluck('total')->toArray();

        if (empty($chartTopikLabels)) {
            $chartTopikLabels = ['Sistem Informasi', 'IoT', 'Web Dev', 'Mobile Dev'];
            $chartTopikData = [0, 0, 0, 0];
        }

        // 4. Data Dosen & Chart Beban Bimbingan (Filter dari Tabel Users)
        $dosenList = User::whereIn('role', ['dosen', 'dospem'])->get();
        $chartDosenLabels = $dosenList->map(function ($dosen) {
            return $dosen->name ?? $dosen->nama ?? 'Dosen';
        })->toArray();

        $chartDosenData = $dosenList->map(function ($dosen) {
            return $dosen->total_bimbingan ?? 0;
        })->toArray();

        return view('koorprodi.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'avgBeban',
            'topikTerbanyak',
            'dosenList',
            'chartTopikLabels',
            'chartTopikData',
            'chartDosenLabels',
            'chartDosenData'
        ));
    }
}
