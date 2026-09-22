@extends('layout')
@section('title', 'Daftar Buku')

@section('content')
    <form method="get" class="row">
        <input type="text" name="q" value="{{ $q }}" placeholder="Cari judul ... ">
        <button type="submit">Cari</button>
        <a href="{{ route('buku.create') }}" style="text-decoration:none; color:black;">+ Tambah</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buku as $b)
                <tr>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->penulis }}</td>
                    <td>{{ $b->tahun }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $b) }}">Edit</a>
                        <form action="{{ route('buku.destroy', $b) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
