@extends('layouts.app')

@section('title', 'Data Arsip')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3>Selamat Datang di Portal Tugas Akhir</h3>
            <p class="text-muted">Silakan pilih menu di sidebar sebelah kiri untuk memulai pengajuan topik atau judul proposal.</p>
        </div>
    </div>
@endsection@extends('layouts.app')

@section('title', 'Data Arsip')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Data Arsip Proposal Disetujui (2021–2030)</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Cari kata kunci judul atau nama mahasiswa...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>Tahun</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul Proposal Disetujui</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024</td>
                            <td>210101001</td>
                            <td>Ahmad Fauzi</td>
                            <td>Pengembangan Sistem Pakar Diagnosa Penyakit Tanaman</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection