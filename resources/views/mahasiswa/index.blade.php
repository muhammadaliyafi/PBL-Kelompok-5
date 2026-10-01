<!DOCTYPE html>
<html lang="id">

<head>
    <title>Data Mahasiswa SIPETA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Daftar Mahasiswa - Prodi TI</h2>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Data Manual</a>

        <!-- Notifikasi jika sukses -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $m)
                    <tr>
                        <td>{{ $m->nim }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->angkatan }}</td>
                        <td>{{ $m->prodi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
