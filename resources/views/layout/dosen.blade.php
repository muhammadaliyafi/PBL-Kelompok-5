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

        html,
        body {
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

        button,
        input,
        select,
        textarea {
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
            border-bottom: 1px solid rgba(255, 255, 255, .09);
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
            border-top: 1px solid rgba(255, 255, 255, .08);
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
            position: relative;
        }

        .profile-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .profile-btn:hover {
            background: #f1f5f9;
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

        /* DROPDOWN PROFIL */
        .profile-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            width: 200px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            padding: 6px 0;
            z-index: 200;
        }

        .profile-dropdown.hidden {
            display: none;
        }

        .dropdown-header {
            padding: 10px 16px;
            border-bottom: 1px solid #f1f5f9;
        }

        .dropdown-header .user-name {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
        }

        .dropdown-header .user-email {
            font-size: 11px;
            color: #64748b;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 10px 16px;
            background: none;
            border: none;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            text-align: left;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .dropdown-item:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .dropdown-item.danger {
            color: #dc2626;
        }

        .dropdown-item.danger:hover {
            background: #fef2f2;
            color: #b91c1c;
        }

        /* MODAL GANTI ROLE */
        .role-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .role-modal-overlay.hidden {
            display: none;
        }

        .role-modal-card {
            background: #fff;
            border-radius: 16px;
            width: 100%;
            max-width: 380px;
            padding: 24px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .role-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .role-modal-header h3 {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
        }

        .close-modal-btn {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 20px;
            line-height: 1;
        }

        .close-modal-btn:hover {
            color: #f43f5e;
        }

        .role-option-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .role-option-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s;
        }

        .role-option-item:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        .role-option-item.active {
            border: 2px solid #2563eb;
            background: #eff6ff;
        }

        .role-option-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .role-avatar-badge {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .role-option-item.active .role-avatar-badge {
            background: #2563eb;
            color: #fff;
        }

        .role-option-title {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .role-option-item.active .role-option-title {
            color: #1e3a8a;
            font-weight: 700;
        }

        .role-option-desc {
            font-size: 10px;
            color: #94a3b8;
        }

        .role-option-item.active .role-option-desc {
            color: #2563eb;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* KONTEN HALAMAN */
        .content {
            width: 100%;
            padding: 28px;
            margin: 0;
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
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="sidebar-brand">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14v7" />
            </svg>

            <span>SIPETA</span>
        </div>

        <nav class="menu">
            <a href="{{ route('dosen.dashboard') }}"
                class="{{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('dosen.validasi') }}" class="{{ request()->routeIs('dosen.validasi') ? 'active' : '' }}">
                Verifikasi Judul
            </a>

            <a href="{{ route('dosen.arsip') }}" class="{{ request()->routeIs('dosen.arsip') ? 'active' : '' }}">
                Data Arsip
            </a>
        </nav>

        <div class="sidebar-footer">
            Dospem POV &copy; 2026
        </div>

    </aside>

    <!-- KONTEN UTAMA -->
    <div class="main">

        <!-- TOP NAVBAR -->
        <header class="top-navbar">
            <h1>Sistem Informasi Proposal dan Tugas Akhir</h1>

            <!-- User Profile & Dropdown Container -->
            <div class="navbar-profile">
                <button id="profileBtn" type="button" class="profile-btn">
                    <span class="role-label">Dosen Pembimbing</span>
                    <div class="profile-avatar">DP</div>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileDropdown" class="profile-dropdown hidden">
                    <div class="dropdown-header">
                        <p class="user-name">Dosen Pembimbing</p>
                        <p class="user-email">dosen@politala.ac.id</p>
                    </div>

                    <button type="button" id="btnGantiRole" class="dropdown-item">
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                        Ganti Role
                    </button>

                    <form action="/logout" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="dropdown-item danger">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Keluar Sistem
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- ISI HALAMAN -->
        <main class="content">
            @yield('content')
        </main>

    </div>

    <!-- MODAL GANTI ROLE -->
    <div id="modalRole" class="role-modal-overlay hidden">
        <div id="modalOverlay" style="position: absolute; inset: 0;"></div>

        <div class="role-modal-card">
            <div class="role-modal-header">
                <h3>Pilih Hak Akses</h3>
                <button type="button" id="closeModalRole" class="close-modal-btn">&times;</button>
            </div>

            <div class="role-option-list">
                <!-- Admin Gugus TA -->
                <a href="{{ url('/gugus-ta/dashboard') }}" class="role-option-item">
                    <div class="role-option-left">
                        <div class="role-avatar-badge">AG</div>
                        <div>
                            <div class="role-option-title">Admin Gugus TA</div>
                            <div class="role-option-desc">Pusat Kendali Sistem</div>
                        </div>
                    </div>
                </a>

                <!-- Dosen Pembimbing (Aktif) -->
                <div class="role-option-item active">
                    <div class="role-option-left">
                        <div class="role-avatar-badge">DP</div>
                        <div>
                            <div class="role-option-title">Dosen Pembimbing</div>
                            <div class="role-option-desc">Sedang Aktif</div>
                        </div>
                    </div>
                    <svg style="width: 20px; height: 20px; color: #2563eb;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <!-- Koordinator Prodi -->
                <a href="{{ url('/koorprodi/dashboard') }}" class="role-option-item">
                    <div class="role-option-left">
                        <div class="role-avatar-badge">KP</div>
                        <div>
                            <div class="role-option-title">Koordinator Prodi</div>
                            <div class="role-option-desc">Akses Penuh Akademik</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- SCRIPT DROPDOWN & MODAL -->
    <script>
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileBtn) {
            profileBtn.addEventListener('click', (event) => {
                event.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });
        }

        document.addEventListener('click', (event) => {
            if (profileDropdown && !profileDropdown.contains(event.target) && !profileDropdown.classList.contains(
                    'hidden')) {
                profileDropdown.classList.add('hidden');
            }
        });

        const btnGantiRole = document.getElementById('btnGantiRole');
        const modalRole = document.getElementById('modalRole');
        const closeModalRole = document.getElementById('closeModalRole');
        const modalOverlay = document.getElementById('modalOverlay');

        if (btnGantiRole) {
            btnGantiRole.addEventListener('click', () => {
                profileDropdown.classList.add('hidden');
                modalRole.classList.remove('hidden');
            });
        }

        const tutupModalRole = () => modalRole.classList.add('hidden');
        if (closeModalRole) closeModalRole.addEventListener('click', tutupModalRole);
        if (modalOverlay) modalOverlay.addEventListener('click', tutupModalRole);
    </script>

    @yield('script')

</body>

</html>
