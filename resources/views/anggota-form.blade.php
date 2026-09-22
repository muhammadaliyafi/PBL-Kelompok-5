@extends('layout')
@section('title', $anggota->exists ? 'Edit Anggota' : 'Tambah Anggota')

@section('content')
    <h3>{{ $anggota->exists ? 'Edit Anggota' : 'Tambah Anggota' }}</h3>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $anggota->exists ? route('anggota.update', $anggota) : route('anggota.store') }}" method="post">
        @csrf
        @if ($anggota->exists)
            @method('PUT')
        @endif

        <div style="margin-bottom: 10px;">
            <label for="nim">NIM</label><br>
            <input type="text" id="nim" name="nim" value="{{ old('nim', $anggota->nim) }}" required
                style="width: 300px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="nama">Nama</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $anggota->nama) }}" required
                style="width: 300px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="prodi">Program Studi</label><br>
            <input type="text" id="prodi" name="prodi" value="{{ old('prodi', $anggota->prodi) }}" required
                style="width: 300px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="no_hp">No HP</label><br>
            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $anggota->no_hp) }}" required
                style="width: 300px;">
        </div>

        <button type="submit">{{ $anggota->exists ? 'Perbarui' : 'Simpan' }}</button>
        <a href="{{ route('anggota.index') }}" style="margin-left: 10px; text-decoration: none; color: #555;">Batal</a>
    </form>
@endsection
