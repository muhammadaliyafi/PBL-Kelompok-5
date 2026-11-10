<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

// Import Controller Gugus TA & Auth
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\GugusTA\DashboardController as GugusTADashboardController;
use App\Http\Controllers\GugusTA\MahasiswaController;
use App\Http\Controllers\GugusTA\VerifikasiController;
use App\Http\Controllers\GugusTA\DosenController;
use App\Http\Controllers\GugusTA\PlotingController;
use App\Http\Controllers\GugusTA\BankTopikController;
use App\Http\Controllers\GugusTA\ArsipJudulController;

// Import Controller Koorprodi
use App\Http\Controllers\Koorprodi\DashboardController as KoorprodiDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes - SiPETA Application
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. ROUTE PUBLIC / AUTENTIKASI / GOOGLE SSO
// ==========================================
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('mahasiswa.dashboard');
    }
    return view('login');
})->name('login');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
})->name('logout');

// Route Google SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/pilih-role', [AuthController::class, 'showSelectRole'])->name('select.role');
Route::post('/pilih-role', [AuthController::class, 'setRole'])->name('set.role');


// ==========================================
// 2. ROUTE MAHASISWA
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Dashboard Mahasiswa
    Route::get('/mahasiswa/dashboard', function () {
        $userId = Auth::id();

        $topikDipilih = DB::table('pengajuan_topiks')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $pengajuanJudul = DB::table('pengajuan_juduls')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $currentStep = 1;
        if ($topikDipilih) {
            $currentStep = 2;
        }
        if ($pengajuanJudul) {
            $currentStep = 3;
        }

        return view('mahasiswa.dashboard', compact('topikDipilih', 'pengajuanJudul', 'currentStep'));
    })->name('mahasiswa.dashboard');

    // Pengajuan Topik & Kuesioner
    Route::get('/mahasiswa/pengajuan-topik', function (Request $request) {
        $userId = Auth::id();

        $topikDipilih = DB::table('pengajuan_topiks')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $alternatif = [
            'A1' => [
                'nama' => 'Sistem Informasi Terintegrasi (Sensor API)',
                'deskripsi' => 'Pengembangan sistem terintegrasi API pihak ketiga, sensor, dan otomatisasi alur kerja.',
                'matkul' => ['Pemrograman Web Dasar', 'Pemrograman Web Lanjut', 'Integrasi Sistem'],
                'batas_minimum' => [
                    'HARUS ada integrasi pihak ketiga (RajaOngkir, Duitku, Midtrans, Email, WA Gateway/Telegram, dll)',
                    'Database minimal 7 tabel (sesuaikan kompleksitas)',
                    'Menggunakan framework terkini (Laravel 13, Golang, CI 4.7)',
                    'Minimal user 3',
                    'Harus dihosting sejak sebelum sidang',
                    'Laporan menyertakan pengujian UAT & pengujian integrasi'
                ]
            ],
            'A2' => [
                'nama' => 'Internet of Things (IoT)',
                'deskripsi' => 'Implementasi perangkat keras, mikrokontroler, dan sensor pintar berbasis IoT.',
                'matkul' => ['Elektronika Dasar & Sensoring', 'Komunikasi Data dan Jaringan Komputer', 'Cloud & IoT'],
                'batas_minimum' => [
                    'Interface web/mobile (Buat Sendiri)',
                    'Bersedia menyerahkan alat IoT ke kampus setelah sidang',
                    'Harus ada database',
                    'Tema DIUTAMAKAN smart agrotechnology atau smart living',
                    'Interface platform IoT (Blynk, ThingsBoard, IoTera, dll) terintegrasi Webhook/Webservice API ke DB/app sendiri',
                    'Buat video demonstrasi alat dan dokumen tutorial penggunaan'
                ]
            ],
            'A3' => [
                'nama' => 'Pengembangan Game (Menggunakan Database)',
                'deskripsi' => 'Perancangan game edukasi, simulasi interaktif, dan hiburan berbasis database.',
                'matkul' => ['Algoritma & Pemrograman', 'Struktur Data', 'Desain UI/UX'],
                'batas_minimum' => [
                    'Kuat mental kuat perangkat',
                    'Harus ada aplikasinya & ada databasenya (pakai DBMS)',
                    'Pada saat mengajukan proposal harus sudah lengkap skenarios permainannya',
                    'Harus ada storynya',
                    'Tema boleh bebas (boleh untuk tujuan hiburan)',
                    'Harus mengoding (tidak boleh membuat game dengan cara drag drop)'
                ]
            ],
            'A4' => [
                'nama' => 'Virtual (VR) / Augmented Reality (AR)',
                'deskripsi' => 'Pengembangan aplikasi realitas maya (VR) dan realitas tertambah (AR).',
                'matkul' => ['Desain Grafis', 'Interaksi Manusia Komputer', 'Aljabar Linier'],
                'batas_minimum' => [
                    'Ada databasenya (pakai DBMS)',
                    'Minimal aset bikin sendiri 50%, 50% boleh pakai aset orang lain (sertakan copyright)',
                    'Tema HARUS smart agrotechnology atau smart living'
                ]
            ],
            'A5' => [
                'nama' => 'Data Mining / Kecerdasan Buatan / SPK',
                'deskripsi' => 'Penerapan metode SPK, pemrosesan data mining, dan kecerdasan buatan.',
                'matkul' => ['Statistika & Probabilitas', 'Teknik Pengambilan Keputusan', 'Data Mining'],
                'batas_minimum' => [
                    'Ada interface (terdapat visualisasi data, akurasi)',
                    'Sistemnya harus ada CRUD',
                    'Harus ada perhitungan manual dalam laporannya',
                    'Program sesuai dengan alur perhitungan manual (pakai library)',
                    'Laporan terdapat analisis hasil dan makna pengujian',
                    'Data minimal 200 record',
                    'Studi kasus nyata (data asli) / relevan kebutuhan industri/lokal',
                    'Tema DIUTAMAKAN smart agrotechnology atau smart living'
                ]
            ]
        ];

        $isRehitung = $request->has('rehitung');

        return view('mahasiswa.pengajuan_topik', compact('topikDipilih', 'alternatif', 'isRehitung'));
    })->name('mahasiswa.pengajuan-topik');

    Route::get('/mahasiswa/kuesioner', function () {
        return redirect()->route('mahasiswa.pengajuan-topik', ['rehitung' => 1]);
    })->name('mahasiswa.kuesioner');

    Route::post('/mahasiswa/kuesioner/hitung', function (Request $request) {
        $userId = Auth::id();
        $minat = $request->input('minat', []);
        $nilaiMatkul = $request->input('nilai_matkul', []);
        $anggaran = $request->input('anggaran', 2);

        $alternatifList = [
            'A1' => 'Sistem Informasi Terintegrasi (Sensor API)',
            'A2' => 'Internet of Things (IoT)',
            'A3' => 'Pengembangan Game (Menggunakan Database)',
            'A4' => 'Virtual (VR) / Augmented Reality (AR)',
            'A5' => 'Data Mining / Kecerdasan Buatan / SPK',
        ];

        $alternatifMatkul = [
            'A1' => ['Pemrograman Web Dasar', 'Pemrograman Web Lanjut', 'Integrasi Sistem'],
            'A2' => ['Elektronika Dasar & Sensoring', 'Komunikasi Data dan Jaringan Komputer', 'Cloud & IoT'],
            'A3' => ['Algoritma & Pemrograman', 'Struktur Data', 'Desain UI/UX'],
            'A4' => ['Desain Grafis', 'Interaksi Manusia Komputer', 'Aljabar Linier'],
            'A5' => ['Statistika & Probabilitas', 'Teknik Pengambilan Keputusan', 'Data Mining'],
        ];

        foreach ($nilaiMatkul as $kodeTopik => $listVal) {
            foreach ($listVal as $idx => $val) {
                $namaMatkul = $alternatifMatkul[$kodeTopik][$idx] ?? ('Matkul ' . ($idx + 1));
                $nilaiVal = floatval($val ?: 75);

                DB::table('nilai_prasyarats')->updateOrInsert(
                    [
                        'user_id'     => $userId,
                        'kode_topik'  => $kodeTopik,
                        'nama_matkul' => $namaMatkul
                    ],
                    [
                        'nilai'      => $nilaiVal,
                        'updated_at' => now(),
                        'created_at' => now()
                    ]
                );
            }
        }

        $hasilSpk = [];
        foreach ($alternatifList as $kode => $nama) {
            $skalaMinat = floatval($minat[$kode] ?? 3);
            $listNilai = $nilaiMatkul[$kode] ?? [75, 75, 75];
            $sumMatkul = 0;
            foreach ($listNilai as $val) {
                $sumMatkul += floatval($val ?: 75);
            }
            $avgMatkul = $sumMatkul / max(count($listNilai), 1);

            $scoreV = (($skalaMinat / 5) * 0.4) + (($avgMatkul / 100) * 0.4) + ((floatval($anggaran) / 3) * 0.2);
            $scoreVFormatted = number_format($scoreV, 3);

            if ($scoreV >= 0.85) {
                $ket = 'Sangat Direkomendasikan';
                $badge = 'bg-emerald-100 text-emerald-700 border-emerald-300';
            } elseif ($scoreV >= 0.70) {
                $ket = 'Direkomendasikan';
                $badge = 'bg-blue-100 text-blue-700 border-blue-300';
            } else {
                $ket = 'Pertimbangan';
                $badge = 'bg-amber-100 text-amber-700 border-amber-300';
            }

            $hasilSpk[] = [
                'kode' => $kode,
                'nama' => $nama,
                'keterangan' => $ket,
                'badgeColor' => $badge,
                'c1' => $skalaMinat,
                'c2' => number_format($avgMatkul, 1),
                'v' => $scoreVFormatted
            ];
        }

        usort($hasilSpk, function ($a, $b) {
            return $b['v'] <=> $a['v'];
        });

        return redirect()->route('mahasiswa.pengajuan-topik', ['rehitung' => 1])->with('hasil_spk', $hasilSpk);
    })->name('mahasiswa.kuesioner.hitung');

    Route::post('/mahasiswa/kuesioner/pilih', function (Request $request) {
        $userId = Auth::id();
        $nilaiV = $request->input('nilai_v') ?? '0.850';

        $dataInsert = [
            'user_id'    => $userId,
            'kode_topik' => $request->input('kode_topik'),
            'nama_topik' => $request->input('nama_topik'),
            'status'     => 'Dipilih',
            'updated_at' => now(),
            'created_at' => now(),
        ];

        if (Schema::hasColumn('pengajuan_topiks', 'nilai_preferensi')) {
            $dataInsert['nilai_preferensi'] = $nilaiV;
        }
        if (Schema::hasColumn('pengajuan_topiks', 'nilai_v')) {
            $dataInsert['nilai_v'] = $nilaiV;
        }

        DB::table('pengajuan_topiks')->updateOrInsert(
            ['user_id' => $userId],
            $dataInsert
        );

        return redirect()->route('mahasiswa.pengajuan-topik')->with('success', 'Topik "' . $request->input('nama_topik') . '" berhasil diajukan!');
    })->name('mahasiswa.kuesioner.pilih');

    Route::delete('/mahasiswa/pengajuan-topik/batal', function () {
        $userId = Auth::id();

        DB::table('pengajuan_topiks')->where('user_id', $userId)->delete();
        DB::table('pengajuan_juduls')->where('user_id', $userId)->delete();

        return redirect()->route('mahasiswa.pengajuan-topik')->with('success', 'Pengajuan topik berhasil dibatalkan. Anda dapat memilih topik kembali.');
    })->name('mahasiswa.pengajuan-topik.batal');

    // Pengajuan Judul
    Route::get('/mahasiswa/pengajuan-judul', function (Request $request) {
        $userId = Auth::id();

        $topikDipilih = DB::table('pengajuan_topiks')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $pengajuanJudul = DB::table('pengajuan_juduls')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $isEdit = $request->has('edit');

        return view('mahasiswa.pengajuan_judul', compact('topikDipilih', 'pengajuanJudul', 'isEdit'));
    })->name('mahasiswa.pengajuan-judul');

    Route::post('/mahasiswa/pengajuan-judul/simpan', function (Request $request) {
        $request->validate([
            'judul_ta' => 'required|string|max:255',
            'deskripsi_judul' => 'required|string',
        ]);

        $userId = Auth::id();

        DB::table('pengajuan_juduls')->updateOrInsert(
            ['user_id' => $userId],
            [
                'user_id'          => $userId,
                'kode_topik'       => $request->input('kode_topik'),
                'nama_topik'       => $request->input('nama_topik'),
                'judul_ta'         => $request->input('judul_ta'),
                'jenis_kasus'      => $request->input('jenis_kasus'),
                'genre_game'       => $request->input('genre_game'),
                'tools_game'       => $request->input('tools_game'),
                'integrasi_sistem' => $request->input('dynamic_tags'),
                'deskripsi_judul'  => $request->input('deskripsi_judul'),
                'status'           => 'Menunggu Verifikasi',
                'created_at'       => now(),
                'updated_at'       => now(),
            ]
        );

        return redirect()->route('mahasiswa.pengajuan-judul')->with('success', 'Pengajuan judul Tugas Akhir berhasil disimpan!');
    })->name('mahasiswa.pengajuan-judul.simpan');

    Route::get('/mahasiswa/pengajuan-judul/edit/{id}', function ($id) {
        return redirect()->route('mahasiswa.pengajuan-judul', ['edit' => 1]);
    })->name('mahasiswa.pengajuan-judul.edit');

    Route::delete('/mahasiswa/pengajuan-judul/hapus/{id}', function ($id) {
        $userId = Auth::id();
        DB::table('pengajuan_juduls')->where('user_id', $userId)->delete();

        return redirect()->route('mahasiswa.pengajuan-judul')->with('success', 'Pengajuan judul berhasil dibatalkan!');
    })->name('mahasiswa.pengajuan-judul.hapus');

    // Status Validasi
    Route::get('/mahasiswa/status-validasi', function () {
        $userId = Auth::id();

        $pengajuanJudul = DB::table('pengajuan_juduls')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        return view('mahasiswa.status_validasi', compact('pengajuanJudul'));
    })->name('mahasiswa.status-validasi');

    // Data Arsip
    Route::get('/mahasiswa/data-arsip', function (Request $request) {
        $search = $request->input('search');
        $topik  = $request->input('topik');
        $tahun  = $request->input('tahun');

        $query = DB::table('arsip_juduls');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%')
                    ->orWhere('nim', 'like', '%' . $search . '%');
            });
        }

        if (!empty($topik)) {
            $query->where('topik', $topik);
        }

        if (!empty($tahun)) {
            $query->where('tahun', $tahun);
        }

        $arsip = $query->orderBy('tahun', 'desc')->paginate(10);

        $list_topik = DB::table('arsip_juduls')->distinct()->pluck('topik');
        $list_tahun = DB::table('arsip_juduls')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        $total_arsip = DB::table('arsip_juduls')->count();

        return view('mahasiswa.data_arsip', compact('arsip', 'list_topik', 'list_tahun', 'total_arsip'));
    })->name('mahasiswa.data-arsip');
});


// ==========================================
// 3. ROUTES DOSEN PEMBIMBING
// ==========================================
Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
    Route::view('/mahasiswa', 'pages.mahasiswa')->name('mahasiswa');
    Route::view('/topik', 'pages.topik')->name('topik');
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
});


// ==========================================
// 4. ROUTES GUGUS TA
// ==========================================
Route::prefix('gugus-ta')->group(function () {
    Route::get('/dashboard', [GugusTADashboardController::class, 'index'])->name('gugusta.dashboard');
    Route::get('/bank-topik', [BankTopikController::class, 'index'])->name('topik.index');
    Route::post('/bank-topik', [BankTopikController::class, 'store'])->name('topik.store');
    Route::put('/bank-topik/{id}', [BankTopikController::class, 'update'])->name('topik.update');
    Route::delete('/bank-topik/{id}', [BankTopikController::class, 'destroy'])->name('topik.destroy');
    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('gugusta.verifikasi');
    Route::get('/verifikasi/{id}/review', [VerifikasiController::class, 'review'])->name('gugusta.verifikasi.review');
    Route::post('/verifikasi/{id}', [VerifikasiController::class, 'updateReview'])->name('gugusta.verifikasi.update');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
    Route::delete('/mahasiswa-delete-all', [MahasiswaController::class, 'deleteAll']);
    Route::post('/mahasiswa/bulk-delete', [MahasiswaController::class, 'bulkDelete']);
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    Route::get('/ploting', [PlotingController::class, 'index'])->name('gugusta.ploting');
    Route::post('/ploting', [PlotingController::class, 'store']);
    Route::put('/ploting/{id}', [PlotingController::class, 'update']);
    Route::delete('/ploting/{id}', [PlotingController::class, 'destroy']);
    Route::get('/arsip-judul', [ArsipJudulController::class, 'index'])->name('arsip.index');
    Route::delete('/arsip-judul/delete-all', [ArsipJudulController::class, 'deleteAll'])->name('arsip.delete-all');
    Route::delete('/arsip-judul/{id}', [ArsipJudulController::class, 'destroy'])->name('arsip.destroy');
    Route::post('/arsip-judul/import', [ArsipJudulController::class, 'import'])->name('arsip.import');
});


// ==========================================
// 5. ROUTES KOORPRODI
// ==========================================
Route::prefix('koorprodi')->name('koorprodi.')->group(function () {
    Route::get('/dashboard', [KoorprodiDashboardController::class, 'index'])->name('dashboard');
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
});


// ==========================================
// 6. RUTE ALIAS / REDIRECT
// ==========================================
Route::get('/dashboard', function () {
    return redirect()->route('mahasiswa.dashboard');
});
