
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SiPETA Politala') - SiPETA</title>

    <style>
        /* RESET */
        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        a {
            text-decoration: none;
        }

        button, input, select, textarea {
            font-family: inherit;
        }

        /* LAYOUT UTAMA */
        .dosen-layout {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* SIDEBAR */
        .dosen-sidebar {
            width: 245px;
            min-width: 245px;
            height: 100vh;
            position: sticky;
            top: 0;
            background: #0f172a;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-shrink: 0;
            box-shadow: 3px 0 12px rgba(0,0,0,.08);
            z-index: 100;
        }

        /* BRAND SIPETA */
        .dosen-brand {
            min-height: 100px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        .dosen-brand-icon {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            color: #fff;
        }

        .dosen-brand-text {
            display: flex;
            flex-direction: column;
        }

        .dosen-brand-text h1 {
            margin: 0;
            font-size: 20px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: .3px;
            color: #fff;
        }

        .dosen-brand-text p {
            margin: 3px 0 0;
            font-size: 11px;
            font-weight: 500;
            color: #cbd5e1;
            white-space: nowrap;
        }

        /* MENU SIDEBAR */
        .dosen-menu {
            padding: 14px 11px;
            flex: 1;
        }

        .dosen-menu a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 15px;
            margin-bottom: 5px;
            border-radius: 12px;
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 700;
            transition: all .2s ease;
        }

        .dosen-menu a svg {
            width: 19px;
            height: 19px;
            min-width: 19px;
            stroke: currentColor;
        }

        .dosen-menu a:hover {
            background: rgba(51,65,85,.7);
            color: #fff;
        }

        .dosen-menu a.active {
            background: #2864e8;
            color: #fff;
            box-shadow: 0 4px 10px rgba(37,99,235,.15);
        }

        /* FOOTER SIDEBAR */
        .dosen-sidebar-footer {
            padding: 14px 10px;
            border-top: 1px solid rgba(255,255,255,.08);
            text-align: center;
        }

        .dosen-sidebar-footer p {
            margin: 0;
            font-size: 10px;
            font-weight: 600;
            color: #94a3b8;
            letter-spacing: .3px;
        }

        /* AREA KONTEN */
        .dosen-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* NAVBAR */
        .dosen-navbar {
            height: 70px;
            min-height: 70px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .dosen-navbar-title {
            font-size: 15px;
            font-weight: 600;
            color: #334155;
        }

        /* PROFIL DOSEN */
        .dosen-profile {
            position: relative;
        }

        .dosen-profile-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px;
            border: none;
            background: transparent;
            cursor: pointer;
            border-radius: 10px;
        }

        .dosen-profile-btn:hover {
            background: #f1f5f9;
        }

        .dosen-role-label {
            padding: 9px 13px;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .dosen-avatar {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #2864e8;
            color: #fff;
            font-size: 13px;
            font-weight: 800;
        }

        /* DROPDOWN PROFIL */
        .dosen-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 220px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,.12);
            overflow: hidden;
            z-index: 200;
        }

        .dosen-dropdown.is-hidden {
            display: none;
        }

        .dosen-dropdown-header {
            padding: 13px 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        .dosen-dropdown-header strong {
            display: block;
            font-size: 13px;
            color: #1e293b;
        }

        .dosen-dropdown-header small {
            display: block;
            margin-top: 4px;
            font-size: 11px;
            color: #64748b;
        }

        .dosen-dropdown-item {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: #fff;
            border: none;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
        }

        .dosen-dropdown-item:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .dosen-dropdown-item.danger {
            color: #dc2626;
        }

        .dosen-dropdown-item.danger:hover {
            background: #fef2f2;
        }

        .dosen-dropdown-item svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        /* KONTEN HALAMAN */
        .dosen-content {
            flex: 1;
            min-width: 0;
            padding: 28px;
        }

        /* MODAL GANTI ROLE */
        .dosen-modal {
            position: fixed;
            inset: 0;
            background: rgba(15,23,42,.6);
            backdrop-filter: blur(3px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            z-index: 9999;
        }

        .dosen-modal.is-hidden {
            display: none;
        }

        .dosen-modal-overlay {
            position: absolute;
            inset: 0;
        }

        .dosen-modal-card {
            position: relative;
            width: 100%;
            max-width: 400px;
            padding: 25px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,.2);
        }

        .dosen-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dosen-modal-header h3 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: #1e293b;
        }

        .dosen-modal-close {
            background: none;
            border: none;
            font-size: 25px;
            color: #94a3b8;
            cursor: pointer;
        }

        .dosen-modal-close:hover {
            color: #dc2626;
        }

        .dosen-role-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .dosen-role-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            color: inherit;
            transition: .2s;
        }

        .dosen-role-item:hover {
            background: #f8fafc;
            border-color: #93c5fd;
        }

        .dosen-role-item.current {
            background: #eff6ff;
            border: 2px solid #2563eb;
        }

        .dosen-role-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dosen-role-avatar {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e2e8f0;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
        }

        .dosen-role-item.current .dosen-role-avatar {
            background: #2563eb;
            color: #fff;
        }

        .dosen-role-name {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
        }

        .dosen-role-desc {
            margin-top: 4px;
            font-size: 10px;
            color: #94a3b8;
        }

        .dosen-role-item.current .dosen-role-name {
            color: #1e40af;
        }

        .dosen-role-item.current .dosen-role-desc {
            color: #2563eb;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .dosen-sidebar {
                width: 230px;
                min-width: 230px;
            }

            .dosen-brand {
                padding: 18px;
                gap: 10px;
            }

            .dosen-content {
                padding: 20px;
            }

            .dosen-navbar {
                padding: 0 18px;
            }
        }

        @media (max-width: 600px) {
            .dosen-layout {
                flex-direction: column;
            }

            .dosen-sidebar {
                width: 100%;
                min-width: 100%;
                height: auto;
                min-height: auto;
                position: relative;
            }

            .dosen-brand {
                min-height: 85px;
                padding: 12px 20px;
            }

            .dosen-menu {
                padding: 10px;
            }

            .dosen-sidebar-footer {
                padding: 12px;
            }

            .dosen-navbar {
                position: relative;
                min-height: 65px;
                height: auto;
                padding: 12px;
            }

            .dosen-navbar-title {
                font-size: 11px;
            }

            .dosen-role-label {
                display: none;
            }

            .dosen-content {
                padding: 15px;
            }
        }
    </style>

    @yield('styles')
    @stack('styles')

</head>

<body>

<div class="dosen-layout">

    <!-- SIDEBAR -->

    <aside class="dosen-sidebar">

        <div>

            <!-- LOGO SIPETA -->

            <div class="dosen-brand">

                <svg class="dosen-brand-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">

                    <path d="M12 2L1 7.5L12 13L21 8.5V15H23V7.5L12 2Z"/>
                    <path d="M4 11.2V16C4 17.8 7.6 20.2 12 20.2C16.4 20.2 20 17.8 20 16V11.2L12 15.5L4 11.2Z"/>

                </svg>

                <div class="dosen-brand-text">
                    <h1>SIPETA</h1>
                    <p>Tugas Akhir Politala</p>
                </div>

            </div>


            <!-- MENU SIDEBAR -->

            <nav class="dosen-menu">

                <!-- DASHBOARD -->

                <a href="{{ route('dosen.dashboard') }}"
                    class="{{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}">

                    <svg fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">

                        <path d="M3 10.5L12 3L21 10.5"/>
                        <path d="M5 9.5V21H19V9.5"/>
                        <path d="M9 21V14H15V21"/>

                    </svg>

                    <span>Dashboard</span>

                </a>


                <!-- VERIFIKASI JUDUL -->

                <a href="{{ route('dosen.validasi') }}"
                    class="{{ request()->routeIs('dosen.validasi') ? 'active' : '' }}">

                    <svg fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">

                        <path d="M14 2H6A2 2 0 004 4V20A2 2 0 006 22H18A2 2 0 0020 20V8Z"/>
                        <path d="M14 2V8H20"/>
                        <path d="M8 13H16"/>
                        <path d="M8 17H16"/>

                    </svg>

                    <span>Verifikasi Judul</span>

                </a>


                <!-- DATA ARSIP -->

                <a href="{{ route('dosen.arsip') }}"
                    class="{{ request()->routeIs('dosen.arsip*') ? 'active' : '' }}">

                    <svg fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">

                        <path d="M4 4H20V8H4Z"/>
                        <path d="M5 8V20H19V8"/>
                        <path d="M9 12H15"/>

                    </svg>

                    <span>Data Arsip</span>

                </a>

            </nav>

        </div>


        <!-- FOOTER SIDEBAR -->

        <div class="dosen-sidebar-footer">

            <p>Dosen Pembimbing POV &copy; 2026</p>

        </div>

    </aside>


    <!-- MAIN CONTENT -->

    <div class="dosen-main">


        <!-- NAVBAR ATAS -->

        <header class="dosen-navbar">

            <div class="dosen-navbar-title">
                Sistem Informasi Proposal dan Tugas Akhir
            </div>


            <!-- PROFIL DOSEN -->

            <div class="dosen-profile">

                <button type="button"
                    id="profileBtn"
                    class="dosen-profile-btn">

                    <span class="dosen-role-label">
                        Dosen Pembimbing
                    </span>

                    <span class="dosen-avatar">
                        DP
                    </span>

                </button>


                <!-- DROPDOWN -->

                <div id="profileDropdown"
                    class="dosen-dropdown is-hidden">

                    <div class="dosen-dropdown-header">

                        <strong>Dosen Pembimbing</strong>
                        <small>dosen@politala.ac.id</small>

                    </div>


                    <!-- GANTI ROLE -->

                    <button type="button"
                        id="btnGantiRole"
                        class="dosen-dropdown-item">

                        <svg fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2">

                            <path d="M8 7H20M20 7L16 3M20 7L16 11"/>
                            <path d="M16 17H4M4 17L8 13M4 17L8 21"/>

                        </svg>

                        Ganti Role

                    </button>


                    <!-- KELUAR SISTEM -->

                    <form action="/logout" method="POST">

                        @csrf

                        <button type="submit"
                            class="dosen-dropdown-item danger">

                            <svg fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" stroke-width="2">

                                <path d="M9 21H5A2 2 0 013 19V5A2 2 0 015 3H9"/>
                                <path d="M16 17L21 12L16 7"/>
                                <path d="M21 12H9"/>

                            </svg>

                            Keluar Sistem

                        </button>

                    </form>

                </div>

            </div>

        </header>


        <!-- KONTEN HALAMAN -->

        <main class="dosen-content">

            @yield('content')

        </main>

    </div>

</div>


<!-- MODAL GANTI ROLE -->

<div id="modalRole" class="dosen-modal is-hidden">

    <div id="modalOverlay" class="dosen-modal-overlay"></div>

    <div class="dosen-modal-card">

        <div class="dosen-modal-header">

            <h3>Pilih Hak Akses</h3>

            <button type="button"
                id="closeModalRole"
                class="dosen-modal-close">

                &times;

            </button>

        </div>


        <div class="dosen-role-list">


            <!-- ADMIN GUGUS TA -->

            <a href="{{ url('/gugus-ta/dashboard') }}"
                class="dosen-role-item">

                <div class="dosen-role-info">

                    <div class="dosen-role-avatar">AG</div>

                    <div>

                        <div class="dosen-role-name">
                            Admin Gugus TA
                        </div>

                        <div class="dosen-role-desc">
                            Pusat Kendali Sistem
                        </div>

                    </div>

                </div>

            </a>


            <!-- DOSEN PEMBIMBING -->

            <div class="dosen-role-item current">

                <div class="dosen-role-info">

                    <div class="dosen-role-avatar">DP</div>

                    <div>

                        <div class="dosen-role-name">
                            Dosen Pembimbing
                        </div>

                        <div class="dosen-role-desc">
                            Sedang Aktif
                        </div>

                    </div>

                </div>

                <svg width="22" height="22"
                    fill="none" stroke="#2563eb"
                    viewBox="0 0 24 24" stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                </svg>

            </div>


            <!-- KOORDINATOR PRODI -->

            <a href="{{ url('/koorprodi/dashboard') }}"
                class="dosen-role-item">

                <div class="dosen-role-info">

                    <div class="dosen-role-avatar">KP</div>

                    <div>

                        <div class="dosen-role-name">
                            Koordinator Prodi
                        </div>

                        <div class="dosen-role-desc">
                            Akses Penuh Akademik
                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>


<!-- JAVASCRIPT -->

<script>

    // DROPDOWN PROFIL

    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    if (profileBtn && profileDropdown) {

        profileBtn.addEventListener('click', function(event) {

            event.stopPropagation();

            profileDropdown.classList.toggle('is-hidden');

        });

    }


    // TUTUP DROPDOWN KETIKA KLIK DI LUAR

    document.addEventListener('click', function(event) {

        if (
            profileDropdown &&
            profileBtn &&
            !profileDropdown.contains(event.target) &&
            !profileBtn.contains(event.target)
        ) {

            profileDropdown.classList.add('is-hidden');

        }

    });


    // MODAL GANTI ROLE

    const btnGantiRole = document.getElementById('btnGantiRole');
    const modalRole = document.getElementById('modalRole');
    const closeModalRole = document.getElementById('closeModalRole');
    const modalOverlay = document.getElementById('modalOverlay');

    if (btnGantiRole && modalRole) {

        btnGantiRole.addEventListener('click', function() {

            profileDropdown.classList.add('is-hidden');

            modalRole.classList.remove('is-hidden');

        });

    }


    // TUTUP MODAL

    function tutupModalRole() {

        if (modalRole) {
            modalRole.classList.add('is-hidden');
        }

    }

    if (closeModalRole) {
        closeModalRole.addEventListener('click', tutupModalRole);
    }

    if (modalOverlay) {
        modalOverlay.addEventListener('click', tutupModalRole);
    }


    // TUTUP DENGAN ESCAPE

    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            tutupModalRole();

            if (profileDropdown) {
                profileDropdown.classList.add('is-hidden');
            }

        }

    });

</script>


@yield('script')
@stack('scripts')

</body>
</html>
