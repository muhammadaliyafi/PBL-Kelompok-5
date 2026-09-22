@extends('layout')

@section('content')
    <style>
        /* Styling khusus halaman Create */
        .welcome-card {
            background-color: #eaf1fa;
            padding: 20px 25px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #d0e1f9;
        }

        .welcome-card h3 {
            color: #1a2b4c;
            font-size: 18px;
            margin: 0 0 5px 0;
            font-weight: 600;
        }

        .welcome-card p {
            margin: 0;
            color: #4a5568;
            font-size: 14px;
        }

        .main-panel {
            background-color: white;
            border-radius: 8px;
            border: 1px solid #e0e4e8;
            padding: 25px;
        }

        .panel-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a2b4c;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .grid-container {
            display: flex;
            gap: 20px;
        }

        .form-section {
            flex: 2;
            background-color: #f4f7f9;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e0e4e8;
        }

        .info-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .spk-card {
            background-color: #f4f7f9;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e0e4e8;
            flex-grow: 1;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #1a2b4c;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: inherit;
        }

        .btn-submit {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #357abd;
        }
    </style>

    <!-- Kartu Sambutan (Atas) -->
    <div class="welcome-card">
        <div>
            <h3>Dashboard Mahasiswa</h3>
            <p>Halo <strong>Ali Yafi</strong>, Selamat Datang di Sistem Informasi Proposal Tugas Akhir</p>
        </div>
        <div style="font-size: 40px; opacity: 0.8;">🎓</div>
    </div>

    <!-- Panel Utama Pengajuan -->
    <div class="main-panel">
        <h4 class="panel-title">Status Pengajuan Proposal</h4>

        <!-- Bungkus seluruh form di sini biar tombol submit bisa ditaruh di kanan -->
        <form action="{{ route('pengajuan.store') }}" method="POST">
            @csrf

            <div class="grid-container">
                <!-- Sisi Kiri: Form Input -->
                <div class="form-section">
                    <h5 style="margin-top: 0; color: #1a2b4c; font-size: 15px; margin-bottom: 15px;">Input Judul Proposal
                        Baru</h5>

                    <div style="display: flex; gap: 15px;">
                        <div class="form-group" style="flex: 1;">
                            <label>Pilih Topik Utama</label>
                            <select name="topik" class="form-control" required>
                                <option value="">Pilih Topik...</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="IoT">IoT</option>
                                <option value="Data Science">Data Science</option>
                                <option value="Game Dev">Game Dev</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Judul Proposal</label>
                            <input type="text" name="judul_proposal" class="form-control"
                                placeholder="Masukkan Judul Proposal" required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label>Deskripsi Ringkas</label>
                        <textarea name="deskripsi" class="form-control" placeholder="Jelaskan secara singkat tentang proposal anda"
                            rows="5" required></textarea>
                    </div>
                </div>

                <!-- Sisi Kanan: Tombol Submit & Info SPK -->
                <div class="info-section">
                    <!-- Tombol Submit ada di sini -->
                    <button type="submit" class="btn-submit">+ Input Pengajuan Proposal</button>

                    <!-- Kotak Info SPK (Cuma UI statis sementara biar persis Figma) -->
                    <div class="spk-card">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                            <div
                                style="background-color:#4a90e2; color:white; width:25px; height:25px; border-radius:50%; display:flex; justify-content:center; align-items:center; font-weight:bold;">
                                i</div>
                            <strong style="color: #1a2b4c; font-size: 14px;">Rekomendasi SPK</strong>
                        </div>
                        <div style="font-size: 12px; color: #4a5568; margin-bottom: 10px;">
                            <span style="display:block; font-weight:bold; color: #1a2b4c;">Topik Rekomendasi:</span>
                            Sistem Informasi (88%)
                        </div>
                        <div style="font-size: 12px; color: #4a5568;">
                            <span style="display:block; font-weight:bold; color: #1a2b4c;">Dosen Rekomendasi:</span>
                            Sausan Hidayah Nova, S.Kom., M.Kom.<br>
                            <small style="color: gray;">(Menunggu plot Gugus TA)</small>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
