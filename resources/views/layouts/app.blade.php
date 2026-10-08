<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAHASISWA</title>
    <!-- FontAwesome & Google Font / Tailwind CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-['Plus_Jakarta_Sans'] text-slate-800 antialiased">

    <div class="flex min-h-screen w-full overflow-x-hidden">

        <!-- SIDEBAR -->
        <aside class="w-64 min-w-[256px] bg-[#0b1739] text-white flex flex-col justify-between p-6 shrink-0">
            <div>
                <!-- LOGO -->
                <div class="flex items-center gap-3 px-4 py-3">
    <i class="fa-solid fa-graduation-cap text-blue-500 text-2xl"></i>
    <span class="text-white font-extrabold text-lg tracking-wider">SIPETA</span>
</div>

                <!-- MENU NAVIGATION (DINAMIS SESUAI URL) -->
                <nav class="flex flex-col gap-2">
                    <a href="{{ url('/mahasiswa/dashboard') }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-sm transition {{ request()->is('mahasiswa/dashboard') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <i class="fa-solid fa-house w-5"></i> Dashboard
                    </a>

                    <a href="{{ url('/mahasiswa/pengajuan-topik') }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-sm transition {{ request()->is('mahasiswa/pengajuan-topik*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <i class="fa-solid fa-file-pen w-5"></i> Pengajuan Topik
                    </a>

                    <a href="{{ url('/mahasiswa/pengajuan-judul') }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-sm transition {{ request()->is('mahasiswa/pengajuan-judul*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <i class="fa-regular fa-file-lines w-5"></i> Pengajuan Judul
                    </a>

                    <a href="{{ url('/mahasiswa/status-validasi') }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-sm transition {{ request()->is('mahasiswa/status-validasi*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <i class="fa-solid fa-shield-halved w-5"></i> Status Validasi
                    </a>

                    <a href="{{ url('/mahasiswa/data-arsip') }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-sm transition {{ request()->is('mahasiswa/data-arsip*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <i class="fa-regular fa-folder w-5"></i> Data Arsip
                    </a>
                </nav>
            </div>

            <!-- LOGOUT -->
            <div>
                <a href="{{ url('/logout') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-red-400 hover:bg-slate-800 font-semibold text-sm transition">
                    <i class="fa-solid fa-right-from-bracket w-5"></i> Logout
                </a>
            </div>
        </aside>

        <!-- AREA KONTEN UTAMA -->
        <main class="flex-1 min-w-0 p-8 overflow-y-auto">
            @yield('content')
        </main>

    </div>

</body>
</html>
=======

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CRUD Product')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <main class="container mx-auto max-w-6xl px-6 py-10">
        @yield('content')
    </main>
</body>

</html>
>>>>>>> 364f54b8eb18d10304832d19c2b42859dd6fd30e
