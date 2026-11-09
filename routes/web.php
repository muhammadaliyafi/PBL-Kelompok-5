<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes - SiPETA Application
|--------------------------------------------------------------------------
*/

// --------------------------------------------------------------------------
// ROUTE AUTENTIKASI & GOOGLE SSO (PUBLIC)
// --------------------------------------------------------------------------

// Route Login Utama (Halaman GET)
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('mahasiswa.dashboard');
    }
    return view('login');
})->name('login');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('mahasiswa.dashboard');
    }
    return view('login');
});

// Route Handler Form Login Manual (POST)
Route::post('/login', function (Request $request) {
    return back()->with('error', 'Silakan gunakan tombol Login dengan Google.');
})->name('login.post');

// Logout Route (POST & CSRF Protected)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
})->name('logout');

// Route Google SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// --------------------------------------------------------------------------
// ROUTE MAHASISWA (TERKUNCI AUTHENTICATION / WAJIB LOGIN)
// --------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    // ----------------------------------------------------------------------
    // 1. DASHBOARD MAHASISWA
    // ----------------------------------------------------------------------
    Route::get('/mahasiswa/dashboard', function () {
        $userId = Auth::id(); // Selalu mengambil ID murni user yang sedang login

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


    // ----------------------------------------------------------------------
    // 2. PENGAJUAN TOPIK & KUESIONER
    // ----------------------------------------------------------------------
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
                    'Pada saat mengajukan proposal harus sudah lengkap skenario permainannya',
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

    // Redirect Fallback Route Kuesioner
    Route::get('/mahasiswa/kuesioner', function () {
        return redirect()->route('mahasiswa.pengajuan-topik', ['rehitung' => 1]);
    })->name('mahasiswa.kuesioner');

    // HITUNG KUESIONER SPK & SIMPAN NILAI PRASYARAT KE DATABASE (DINAMIS PER USER)
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

        // 1. SIMPAN/UPDATE NILAI PRASYARAT (Strict Per User ID)
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

        // 2. HITUNG SKOR SPK AHP-SAW
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

        usort($hasilSpk, function($a, $b) {
            return $b['v'] <=> $a['v'];
        });

        return redirect()->route('mahasiswa.pengajuan-topik', ['rehitung' => 1])->with('hasil_spk', $hasilSpk);
    })->name('mahasiswa.kuesioner.hitung');

    // SIMPAN / UPDATE PILIHAN TOPIK (ANTI NUMPUK PER USER)
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

        // updateOrInsert memastikan 1 user HANYA PUNYA 1 BARIS di pengajuan_topiks
        DB::table('pengajuan_topiks')->updateOrInsert(
            ['user_id' => $userId],
            $dataInsert
        );

        return redirect()->route('mahasiswa.pengajuan-topik')->with('success', 'Topik "' . $request->input('nama_topik') . '" berhasil diajukan!');
    })->name('mahasiswa.kuesioner.pilih');

    // BATALKAN TOPIK (OTOMATIS HAPUS TOPIK & JUDUL TERKAIT MILIK USER TERSEBUT)
    Route::delete('/mahasiswa/pengajuan-topik/batal', function () {
        $userId = Auth::id();
        
        // Hapus topik & judul milik user yang sedang aktif
        DB::table('pengajuan_topiks')->where('user_id', $userId)->delete();
        DB::table('pengajuan_juduls')->where('user_id', $userId)->delete();

        return redirect()->route('mahasiswa.pengajuan-topik')->with('success', 'Pengajuan topik berhasil dibatalkan. Anda dapat memilih topik kembali.');
    })->name('mahasiswa.pengajuan-topik.batal');


    // ----------------------------------------------------------------------
    // 3. PENGAJUAN JUDUL
    // ----------------------------------------------------------------------
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

    // SIMPAN / UPDATE JUDUL (ANTI NUMPUK PER USER)
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

    // BATALKAN / HAPUS JUDUL (BERSIH DARI DATABASE)
    Route::delete('/mahasiswa/pengajuan-judul/hapus/{id}', function ($id) {
        $userId = Auth::id();
        DB::table('pengajuan_juduls')->where('user_id', $userId)->delete();
        
        return redirect()->route('mahasiswa.pengajuan-judul')->with('success', 'Pengajuan judul berhasil dibatalkan!');
    })->name('mahasiswa.pengajuan-judul.hapus');


    // ----------------------------------------------------------------------
    // 4. STATUS VALIDASI
    // ----------------------------------------------------------------------
    Route::get('/mahasiswa/status-validasi', function () {
        $userId = Auth::id();

        $pengajuanJudul = DB::table('pengajuan_juduls')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        return view('mahasiswa.status_validasi', compact('pengajuanJudul'));
    })->name('mahasiswa.status-validasi');


    // ----------------------------------------------------------------------
    // 5. DATA ARSIP
    // ----------------------------------------------------------------------
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