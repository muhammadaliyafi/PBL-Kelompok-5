@extends('layout.dosen')

@section('title', 'Mahasiswa Bimbingan')

@section('content')

<div class="card">

    <div class="card-title">
        Mahasiswa Bimbingan
    </div>

    <div class="card-subtitle">
        Riwayat dan progres seluruh mahasiswa bimbingan (hanya lihat).
    </div>


    <div class="table-wrap">

        <table>

            <thead>

                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Topik</th>
                    <th>Progres</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td class="name">Aditya Pratama</td>
                    <td>2501301001</td>
                    <td>Internet of Things (IoT)</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar"
                                 style="width:20%;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status status-warning">
                            Menunggu Konfirmasi
                        </span>
                    </td>
                </tr>


                <tr>
                    <td class="name">Citra Lestari</td>
                    <td>2501301002</td>
                    <td>Pengembangan Game</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar"
                                 style="width:42%;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status status-warning">
                            Menunggu Validasi Judul
                        </span>
                    </td>
                </tr>


                <tr>
                    <td class="name">Budi Santoso</td>
                    <td>2501301003</td>
                    <td>Internet of Things (IoT)</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar"
                                 style="width:42%;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status status-warning">
                            Menunggu Validasi Judul
                        </span>
                    </td>
                </tr>


                <tr>
                    <td class="name">Dewi Anggraini</td>
                    <td>2501301004</td>
                    <td>Data Mining / SPK</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar"
                                 style="width:72%;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status status-blue">
                            Disetujui Dospem · Proses Gugus TA
                        </span>
                    </td>
                </tr>


                <tr>
                    <td class="name">Eko Prasetyo</td>
                    <td>2501301005</td>
                    <td>Sistem Informasi Terintegrasi</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar"
                                 style="width:100%;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status status-success">
                            ACC Final
                        </span>
                    </td>
                </tr>


                <tr>
                    <td class="name">Fitri Handayani</td>
                    <td>2501301006</td>
                    <td>Pengembangan Game</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar"
                                 style="width:37%;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status status-danger">
                            Revisi (di mahasiswa)
                        </span>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection