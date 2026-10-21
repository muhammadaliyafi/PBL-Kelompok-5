
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SIPETA')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #000000;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input, select, textarea {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 280px;
            height: 100vh;
            background: #07132f;
            color: #fff;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        /* LOGO SIPETA */
        .sidebar-brand {
            height: 72px;
            min-height: 72px;
            padding: 0 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #050e25;
            border-bottom: 1px solid rgba(255,255,255,.09);
        }

        .sidebar-brand svg {
            width: 25px;
            height: 25px;
            flex-shrink: 0;
            color: #3b82f6;
        }

        .sidebar-brand span {
            font-size: 21px;
            font-weight: 700;
            letter-spacing: .2px;
        }

        /* MENU SIDEBAR */
        .menu {
            padding: 18px 12px;
        }

        .menu a {
            display: block;
            padding: 13px 16px;
            margin-bottom: 5px;
            border: 1px solid transparent;
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 15px;
            font-weight: 600;
            transition: background .2s, color .2s;
        }

        .menu a:hover {
            background: #13275a;
            color: #60a5fa;
        }

        .menu a.active {
            background: #14275b;
            border-color: #2452a4;
            color: #60a5fa;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 17px 10px;
            text-align: center;
            color: #7185a9;
            font-size: 12px;
            border-top: 1px solid rgba(255,255,255,.08);
        }

        /* AREA UTAMA */
        .main {
            margin-left: 280px;
            min-height: 100vh;
            min-width: 0;
        }

        /* NAVBAR ATAS */
        .top-navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            width: 100%;
            height: 72px;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
        }

        .top-navbar h1 {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
            font-weight: 600;
            color: #475569;
        }

        .navbar-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .role-label {
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #2864e8;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
        }

        /* KONTEN HALAMAN */
        .content {
            width: 100%;
            padding: 28px;
            margin: 0;
        }

        /* KOMPONEN UMUM */
        .card {
            padding: 25px;
            background: #fff;
            border: 1px solid #e2e7ef;
            border-radius: 15px;
            box-shadow: 0 2px 7px rgba(20,33,61,.04);
        }

        .card-title {
            margin-bottom: 8px;
            font-size: 20px;
            font-weight: 700;
        }

        .card-subtitle {
            margin-bottom: 24px;
            color: #70809a;
            font-size: 14px;
        }

        .welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            margin-bottom: 7px;
            font-size: 26px;
        }

        .welcome p {
            color: #71809a;
            font-size: 14px;
        }

        .role-badge {
            padding: 9px 15px;
            border-radius: 22px;
            background: #eef3ff;
            color: #2458db;
            font-size: 13px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .stat {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: #6e7f9a;
            font-size: 14px;
        }

        .stat strong {
            color: #14213d;
        }

        .process {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .process-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #51647f;
            font-size: 14px;
        }

        .number {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: #e5edff;
            color: #3869e8;
        }

        .quick {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            padding: 12px 16px;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary {
            background: #2864e8;
            color: #fff;
        }

        .btn-light {
            background: #f8fafc;
            color: #14213d;
            border: 1px solid #dfe5ee;
        }

        .btn-danger {
            background: #fff;
            color: #d92525;
            border: 1px solid #ffb4b4;
        }

        .btn-success {
            background: #16a34a;
            color: #fff;
        }

        /* TABEL */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 14px 15px;
            border-bottom: 1px solid #e5eaf1;
            color: #7890b1;
            font-size: 12px;
            font-weight: 600;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #edf0f5;
            font-size: 13px;
            line-height: 1.6;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .name {
            font-weight: 700;
        }

        .nim {
            margin-top: 4px;
            color: #72829b;
            font-size: 12px;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            line-height: 1.5;
        }

        .status-warning {
            background: #fff1bf;
            color: #c76500;
        }

        .status-blue {
            background: #dceaff;
            color: #1454d8;
        }

        .status-success {
            background: #d8f8e5;
            color: #07833d;
        }

        .status-danger {
            background: #ffe0e0;
            color: #df1717;
        }

        /* PENCARIAN */
        .search {
            width: 100%;
            max-width: 380px;
            margin-bottom: 22px;
            padding: 12px 14px;
            border: 1px solid #dce3ee;
            border-radius: 9px;
            background: #fff;
            font-size: 13px;
            outline: none;
        }

        .search:focus {
            border-color: #2864e8;
        }

        .year-list {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            width: fit-content;
            max-width: 100%;
            margin: 8px 0 25px;
            padding: 5px;
            border-radius: 30px;
            background: #f1f5fa;
        }

        .year {
            padding: 9px 14px;
            border-radius: 25px;
            color: #58708f;
            cursor: pointer;
        }

        .year.active {
            background: #fff;
            color: #2160e8;
            box-shadow: 0 1px 4px rgba(0,0,0,.08);
            font-weight: 600;
        }

        .archive-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(15,27,51,.52);
        }

        .modal.show {
            display: flex;
        }

        .modal-box {
            width: 760px;
            max-width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            padding: 25px;
            border-radius: 15px;
            background: #fff;
        }

        .modal-header {
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: 700;
        }

        .steps {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 22px;
        }

        .step {
            padding: 9px 12px;
            border-radius: 8px;
            background: #f0f4f9;
            color: #73839b;
        }

        .step.active {
            background: #dce9ff;
            color: #1f59dc;
            font-weight: 600;
        }

        .detail {
            display: grid;
            grid-template-columns: 160px minmax(0, 1fr);
            gap: 14px;
            font-size: 14px;
        }

        .detail-label {
            color: #71839d;
        }

        .italic {
            color: #74839a;
            font-style: italic;
        }

        textarea {
            width: 100%;
            min-height: 100px;
            margin-top: 8px;
            padding: 12px;
            resize: vertical;
            border: 1px solid #dce3ed;
            border-radius: 9px;
            font-size: 13px;
            outline: none;
        }

        .modal-footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .sidebar {
                width: 240px;
            }

            .main {
                margin-left: 240px;
            }

            .content {
                padding: 22px;
            }

            .dashboard-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
            }

            .sidebar-brand {
                height: 65px;
                min-height: 65px;
            }

            .menu {
                padding: 10px;
            }

            .menu a {
                padding: 11px 13px;
            }

            .sidebar-footer {
                padding: 12px;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .top-navbar {
                position: relative;
                height: auto;
                min-height: 68px;
                padding: 14px 16px;
                gap: 12px;
            }

            .top-navbar h1 {
                font-size: 13px;
            }

            .role-label {
                display: none;
            }

            .content {
                padding: 16px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .welcome {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .detail {
                grid-template-columns: 1fr;
                gap: 7px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="sidebar-brand">
            <svg fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.8"
                      d="M12 14l9-5-9-5-9 5 9 5z"/>
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.8"
                      d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.8"
                      d="M12 14v7"/>
            </svg>

            <span>SIPETA</span>
        </div>

        <nav class="menu">
            <a href="{{ route('dosen.dashboard') }}"
               class="{{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('dosen.validasi') }}"
               class="{{ request()->routeIs('dosen.validasi') ? 'active' : '' }}">
                Verifikasi Judul
            </a>

            <a href="{{ route('dosen.arsip') }}"
               class="{{ request()->routeIs('dosen.arsip') ? 'active' : '' }}">
                Data Arsip
            </a>
        </nav>

        <div class="sidebar-footer">
            Dospem POV © 2026
        </div>

    </aside>

    <!-- KONTEN UTAMA -->
    <div class="main">

        <!-- TOP NAVBAR -->
        <header class="top-navbar">
            <h1>Sistem Informasi Proposal dan Tugas Akhir</h1>

            <div class="navbar-profile">
                <span class="role-label">Dosen Pembimbing</span>
                <div class="profile-avatar">DP</div>
            </div>
        </header>

        <!-- ISI HALAMAN -->
        <main class="content">
            @yield('content')
        </main>

    </div>

    @yield('script')

</body>
</html>
