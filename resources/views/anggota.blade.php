@extends('layout')
@section('title', 'Daftar Anggota')

@section('content')
    <form method="get" class="row">
        <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama atau NIM ... ">
        <button type="submit">Cari</button>
        <a href="{{ route('anggota.create') }}" style="text-decoration:none; color:black;">+ Tambah Anggota</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggota as $a)
                <tr>
                    <td>{{ $a->nim }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->prodi }}</td>
                    <td>{{ $a->no_hp }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $a) }}">Edit</a>
                        <form action="{{ route('anggota.destroy', $a) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
