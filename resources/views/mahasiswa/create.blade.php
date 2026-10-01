@extends('layout')

@section('content')
    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
        <h2>Input Judul Proposal Baru</h2>

        <!-- Arahkan form ke rute store dengan method POST -->
        <form action="{{ route('pengajuan.store') }}" method="POST">
            @csrf <!-- Ini wajib ada di Laravel biar aman -->

            <div style="margin-bottom: 15px;">
                <label>Pilih Topik Utama</label><br>
                <select name="topik" required style="width: 100%; padding: 8px;">
                    <option value="">Pilih Topik...</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="IoT">IoT</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Game Dev">Game Dev</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Judul Proposal</label><br>
                <input type="text" name="judul_proposal" placeholder="Masukkan Judul Proposal" required
                    style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Deskripsi Ringkas</label><br>
                <textarea name="deskripsi" placeholder="Jelaskan secara singkat..." required rows="4"
                    style="width: 100%; padding: 8px;"></textarea>
            </div>

            <button type="submit"
                style="background-color: #4a90e2; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                + Input Pengajuan Proposal
            </button>
        </form>
    </div>
@endsection
