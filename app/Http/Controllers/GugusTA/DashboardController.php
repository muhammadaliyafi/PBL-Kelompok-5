<?php

// FIX 1: Namespace-nya sekarang pakai GugusTA karena foldernya udah dipindah
namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// FIX 2: Panggil model User, BUKAN Mahasiswa!
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // FIX 3: Ngitungnya ngikutin cara lu, hitung User yang rolenya 'mahasiswa'
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();

        // Angka dummy sementara
        $totalDosen = 0;
        $totalArsip = 125;
        $topikTersedia = 5;

        return view('gugusta.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'totalArsip',
            'topikTersedia'
        ));
    }
}
