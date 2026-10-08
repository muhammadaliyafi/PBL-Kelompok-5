@extends('layouts.app')

@section('title', 'Status Validasi')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Status Validasi Proposal</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul Proposal</th>
                            <th>Dosen Pembimbing</th>
                            <th>Status Validasi</th>
                            <th>Catatan / Revisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rancang Bangun Sistem Informasi Pengajuan Proposal TA berbasis Laravel</td>
                            <td>-</td>
                            <td><span class="badge bg-warning text-dark">Menunggu Validasi</span></td>
                            <td><i class="text-muted">Belum ada catatan dari Dospem/Gugus TA</i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection