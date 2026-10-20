<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ArsipJudul;
use App\Models\BankTopik;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung total data real dari database
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalDosen     = User::where('role', 'dosen')->count();
        $totalArsip     = ArsipJudul::count();

        // 2. Hitung jumlah topik jika model BankTopik tersedia
        $topikTersedia  = class_exists(BankTopik::class) ? BankTopik::count() : 0;

        return view('gugusta.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'totalArsip',
            'topikTersedia'
        ));
    }
}
