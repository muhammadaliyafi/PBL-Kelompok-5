
@extends('layout.dosen')

@section('title', 'Data Arsip Judul TA')

@section('content')

<div class="arsip-page">

    {{-- HEADER DATA ARSIP --}}
    <div class="arsip-heading">
        <div class="heading-text">
            <h1>Data Arsip Judul TA</h1>
            <p>Bank pencarian referensi judul dan topik proposal Tugas Akhir yang telah terarsip.</p>
        </div>

        <span class="total-badge">
            {{ $arsip->count() }} dari {{ $arsip->count() }} judul
        </span>
    </div>

    {{-- KARTU UTAMA --}}
    <div class="arsip-card">

        {{-- PENCARIAN DAN FILTER TAHUN --}}
        <form action="{{ route('dosen.arsip') }}"
              method="GET"
              class="arsip-search-form">

            <div class="search-group">
                <label for="search">Search Bar</label>

                <div class="search-box">
                    <span class="search-icon">&#8981;</span>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari judul, nama, atau topik..."
                    >
                </div>
            </div>

            <div class="year-group">
                <label for="tahun">Year</label>

                <select name="tahun" id="tahun">
                    <option value="semua"
                        {{ !request('tahun') || request('tahun') == 'semua' ? 'selected' : '' }}>
                        Semua Tahun
                    </option>

                    @for ($tahun = 2021; $tahun <= 2030; $tahun++)
                        <option value="{{ $tahun }}"
                            {{ (string) request('tahun') === (string) $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- TOMBOL PENCARIAN SAJA --}}
            <div class="search-actions">
                <button type="submit" class="btn-search">
                    Cari
                </button>

                @if(request()->filled('search') ||
                    (request()->filled('tahun') && request('tahun') != 'semua'))
                    <a href="{{ route('dosen.arsip') }}" class="btn-reset">
                        Reset
                    </a>
                @endif
            </div>

        </form>

        {{-- INFORMASI TABEL --}}
        <div class="table-heading">
            <div>
                <h2>Daftar Arsip Judul TA</h2>
                <p>Referensi judul dan topik proposal Tugas Akhir mahasiswa.</p>
            </div>

            <span class="data-count">
                {{ $arsip->count() }} data ditemukan
            </span>
        </div>

        {{-- TABEL READ-ONLY --}}
        <div class="table-wrapper">
            <table class="arsip-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TAHUN</th>
                        <th>NIM</th>
                        <th>NAMA MAHASISWA</th>
                        <th>JUDUL PROPOSAL</th>
                        <th>TOPIK</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($arsip as $item)
                        <tr>
                            <td class="number-cell">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <span class="year-badge">
                                    {{ $item->tahun }}
                                </span>
                            </td>

                            <td class="nim-cell">
                                {{ $item->nim }}
                            </td>

                            <td class="name-cell">
                                {{ $item->nama }}
                            </td>

                            <td class="title-cell">
                                {{ $item->judul_proposal }}
                            </td>

                            <td>
                                <span class="topic-badge">
                                    {{ $item->topik }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-data">
                                <div class="empty-icon">&#9776;</div>

                                <strong>
                                    Belum ada data arsip judul yang tersimpan.
                                </strong>

                                <p>
                                    Data arsip akan muncul di sini setelah tersedia di sistem.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- FOOTER: TETAP MEMPERTAHANKAN AKSES PENGELOLA --}}
        <div class="table-footer">
            <span>
                Menampilkan {{ $arsip->count() }} Data Arsip Judul
            </span>

            <a href="{{ url('/gugus-ta/arsip-judul') }}"
               class="manager-link">
                Akses Pengelola (Gugus TA)
            </a>
        </div>

    </div>

</div>

<style>
    /* PENGATURAN DASAR */
    .arsip-page,
    .arsip-page * {
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif !important;
    }

    .arsip-page {
        width: 100%;
        color: #17243d;
    }

    /* HEADER */
    .arsip-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 28px 27px;
        margin-bottom: 26px;
        background: #fff;
        border: 1px solid #e5ebf4;
        border-radius: 19px;
        box-shadow: 0 2px 5px rgba(25, 55, 100, .025);
    }

    .heading-text {
        min-width: 0;
    }

    .arsip-heading h1 {
        margin: 0 0 7px;
        color: #111f38;
        font-size: 26px;
        line-height: 1.4;
        font-weight: 700;
        letter-spacing: -.4px;
    }

    .arsip-heading p {
        margin: 0;
        color: #7184a1;
        font-size: 13px;
        line-height: 1.7;
    }

    .total-badge {
        flex-shrink: 0;
        padding: 9px 14px;
        border: 1px solid #e0e8f3;
        border-radius: 24px;
        background: #f2f6fb;
        color: #344d6e;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* KARTU TABEL */
    .arsip-card {
        width: 100%;
        margin-bottom: 24px;
        overflow: hidden;
        border: 1px solid #e3eaf4;
        border-radius: 20px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(25, 55, 100, .03);
    }

    /* FORM SEARCH */
    .arsip-search-form {
        display: grid;
        grid-template-columns: minmax(200px, 2fr) minmax(160px, 1fr);
        align-items: end;
        gap: 18px;
        padding: 27px 26px;
        background: #fff;
    }

    .search-group label,
    .year-group label {
        display: block;
        margin-bottom: 9px;
        color: #344d6e;
        font-size: 13px;
        font-weight: 500;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 11px;
        height: 43px;
        padding: 0 13px;
        border: 1px solid #dce5f1;
        border-radius: 13px;
        background: #fff;
        transition: border-color .2s, box-shadow .2s;
    }

    .search-box:focus-within {
        border-color: #2864ed;
        box-shadow: 0 0 0 3px rgba(40, 100, 237, .08);
    }

    .search-icon {
        flex-shrink: 0;
        color: #8ba0bd;
        font-size: 24px;
        line-height: 1;
    }

    .search-box input {
        width: 100%;
        min-width: 0;
        height: 100%;
        padding: 0;
        border: none;
        outline: none;
        background: transparent;
        color: #263b59;
        font-size: 13px;
    }

    .search-box input::placeholder {
        color: #94a5bd;
    }

    /* DROPDOWN TAHUN */
    .year-group select {
        width: 100%;
        height: 43px;
        padding: 0 13px;
        border: 1px solid #dce5f1;
        border-radius: 13px;
        outline: none;
        background: #fff;
        color: #344d6e;
        font-size: 13px;
        cursor: pointer;
    }

    .year-group select:focus {
        border-color: #2864ed;
    }

    /* TOMBOL CARI DAN RESET */
    .search-actions {
        grid-column: 1 / -1;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
    }

    .btn-search,
    .btn-reset {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        min-height: 39px;
        padding: 10px 19px;
        border: 1px solid transparent;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: background .2s;
    }

    .btn-search {
        background: #2864ed;
        color: #fff;
    }

    .btn-search:hover {
        background: #194fca;
    }

    .btn-reset {
        border-color: #e0e8f2;
        background: #fff;
        color: #405675;
    }

    .btn-reset:hover {
        background: #f3f7fc;
    }

    /* JUDUL TABEL */
    .table-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        padding: 0 26px 20px;
    }

    .table-heading h2 {
        margin: 0 0 6px;
        color: #172c4b;
        font-size: 17px;
        font-weight: 700;
    }

    .table-heading p {
        margin: 0;
        color: #8797ae;
        font-size: 12px;
        line-height: 1.6;
    }

    .data-count {
        color: #7184a1;
        font-size: 12px;
        white-space: nowrap;
    }

    /* TABEL ARSIP */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        border-top: 1px solid #edf1f7;
    }

    .arsip-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .arsip-table thead {
        background: #f5f8fc;
    }

    .arsip-table th {
        padding: 18px 20px;
        border-bottom: 1px solid #e5ebf4;
        color: #8192ad;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .2px;
        white-space: nowrap;
    }

    .arsip-table td {
        padding: 18px 20px;
        border-bottom: 1px solid #edf1f7;
        color: #40516b;
        font-size: 13px;
        line-height: 1.7;
        vertical-align: middle;
    }

    .arsip-table tbody tr:hover {
        background: #f9fbff;
    }

    .arsip-table tbody tr:last-child td {
        border-bottom: none;
    }

    .number-cell {
        width: 60px;
        color: #94a3b8 !important;
        font-weight: 600;
    }

    .nim-cell {
        white-space: nowrap;
    }

    .name-cell {
        min-width: 160px;
        color: #263b59 !important;
        font-weight: 600;
    }

    .title-cell {
        min-width: 240px;
        max-width: 420px;
    }

    .year-badge {
        color: #40516b;
        font-weight: 600;
        white-space: nowrap;
    }

    .topic-badge {
        display: inline-block;
        max-width: 180px;
        padding: 5px 10px;
        border-radius: 8px;
        background: #edf4ff;
        color: #2864ed;
        font-size: 11px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    /* PESAN JIKA BELUM ADA DATA */
    .empty-data {
        height: 150px;
        padding: 25px !important;
        text-align: center;
        color: #8497b3 !important;
    }

    .empty-icon {
        margin-bottom: 10px;
        color: #9aacc5;
        font-size: 28px;
    }

    .empty-data strong {
        display: block;
        color: #7184a1;
        font-size: 13px;
        font-weight: 500;
    }

    .empty-data p {
        margin: 6px 0 0;
        font-size: 12px;
    }

    /* FOOTER */
    .table-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding: 18px 26px;
        border-top: 1px solid #edf1f7;
        background: #fff;
        color: #7184a1;
        font-size: 12px;
    }

    .manager-link {
        color: #2864ed;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
        white-space: nowrap;
    }

    .manager-link:hover {
        text-decoration: underline;
    }

    /* TAMPILAN RESPONSIF */
    @media (max-width: 900px) {
        .arsip-heading {
            padding: 24px;
        }

        .arsip-search-form {
            padding: 22px;
        }

        .arsip-table th,
        .arsip-table td {
            padding: 15px;
        }
    }

    @media (max-width: 600px) {
        .arsip-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 20px;
        }

        .arsip-heading h1 {
            font-size: 23px;
        }

        .arsip-search-form {
            grid-template-columns: 1fr;
            padding: 20px;
        }

        .search-actions {
            grid-column: 1;
        }

        .table-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 0 20px 18px;
        }

        .table-footer {
            align-items: flex-start;
            flex-direction: column;
            padding: 16px 20px;
        }
    }
</style>

@endsection
