@extends('layout')
@section('title', $buku->exists ? 'Edit Buku' : 'Tambah Buku')

@section('content')
    <h3>{{ $buku->exists ? 'Edit Buku' : 'Tambah Buku' }}</h3>

    {{-- Menampilkan pesan error validasi jika ada input yang salah --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $buku->exists ? route('buku.update', $buku) : route('buku.store') }}" method="post">
        @csrf
        @if ($buku->exists)
            @method('PUT')
        @endif

        <div style="margin-bottom: 10px;">
            <label for="judul">Judul</label><br>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required
                style="width: 300px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="penulis">Penulis</label><br>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required
                style="width: 300px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="tahun">Tahun</label><br>
            <input type="number" id="tahun" name="tahun" value="{{ old('tahun', $buku->tahun) }}" required
                style="width: 150px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stok">Stok</label><br>
            <input type="number" id="stok" name="stok" value="{{ old('stok', $buku->stok ?? 0) }}" required
                style="width: 150px;">
        </div>

        <button type="submit">{{ $buku->exists ? 'Perbarui' : 'Simpan' }}</button>
        <a href="{{ route('buku.index') }}" style="margin-left: 10px; text-decoration: none; color: #555;">Batal</a>
    </form>
@endsection
