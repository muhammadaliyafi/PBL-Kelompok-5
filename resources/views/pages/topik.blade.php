@extends('layout.dosen')

@section('title', 'Bank Topik')

@section('content')

<div class="card">

    <div class="card-title">
        Bank Topik
    </div>

    <div class="card-subtitle">
        Daftar topik tugas akhir. Penambahan topik diajukan melalui Gugus TA.
    </div>


    <div class="table-wrap">

        <table>

            <thead>
                <tr>
                    <th>Topik</th>
                    <th>Kuota</th>
                    <th>Sisa</th>
                    <th>Keterisian</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td class="name">
                        Sistem Informasi Terintegrasi
                    </td>
                    <td>10</td>
                    <td>4</td>
                    <td>
                        <div class="progress" style="width:330px;">
                            <div class="progress-bar"
                                 style="width:60%;">
                            </div>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="name">
                        Internet of Things (IoT)
                    </td>
                    <td>8</td>
                    <td>3</td>
                    <td>
                        <div class="progress" style="width:330px;">
                            <div class="progress-bar"
                                 style="width:62%;">
                            </div>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="name">
                        Pengembangan Game
                    </td>
                    <td>8</td>
                    <td>5</td>
                    <td>
                        <div class="progress" style="width:330px;">
                            <div class="progress-bar"
                                 style="width:38%;">
                            </div>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="name">
                        AR / VR
                    </td>
                    <td>8</td>
                    <td>4</td>
                    <td>
                        <div class="progress" style="width:330px;">
                            <div class="progress-bar"
                                 style="width:50%;">
                            </div>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="name">
                        Data Mining / SPK
                    </td>
                    <td>8</td>
                    <td>2</td>
                    <td>
                        <div class="progress" style="width:330px;">
                            <div class="progress-bar"
                                 style="width:75%;">
                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection