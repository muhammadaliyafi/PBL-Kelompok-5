<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Akun Anda - SiPETA Politeknik Negeri Tanah Laut</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F1F5F9] min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-3xl shadow-2xl flex max-w-4xl w-full overflow-hidden border border-slate-100">
        <!-- Banner Kiri (Gambar Wisuda) -->
        <div class="hidden md:flex flex-col justify-center items-center w-1/2 bg-[#F8FAFC] p-8 border-r border-slate-100 text-center">
            <img src="/img/login-illustration.jpg" 
                 onerror="this.onerror=null; this.src='/img/login-illustration.png';" 
                 alt="SiPETA Graduation Illustration" 
                 class="w-full max-w-xs object-contain mb-4 rounded-xl">
            
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Sistem Pengajuan<br>Tugas Akhir</h2>
            <p class="text-slate-400 mt-2 text-sm font-medium">Politeknik Negeri Tanah Laut</p>
        </div>

        <!-- Form Login Kanan -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <h3 class="text-2xl font-bold text-slate-800 mb-1">Masuk ke Akun Anda</h3>
            <p class="text-slate-400 text-sm mb-6">Silahkan Login untuk melanjutkan</p>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl font-medium">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" autocomplete="off" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Email/akun pengguna</label>
                    <input type="email" name="email" required autocomplete="new-password"
                           placeholder="Masukkan Email/akun pengguna" 
                           class="w-full px-4 py-3 rounded-xl bg-[#EFF6FF] border border-blue-200 focus:outline-none focus:border-blue-500 focus:bg-white text-sm text-slate-800 transition">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="passwordInput" name="password" required autocomplete="new-password"
                               placeholder="Masukkan password" 
                               class="w-full px-4 py-3 pr-11 rounded-xl bg-[#EFF6FF] border border-blue-200 focus:outline-none focus:border-blue-500 focus:bg-white text-sm text-slate-800 transition">
                        
                        <!-- Tombol Mata (Toggle Password) -->
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-blue-600 focus:outline-none">
                            <svg id="eyeIconShow" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg id="eyeIconHide" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.16 10.16 0 014.122-.863c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-slate-600 text-xs font-medium cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 mr-2">
                        Ingat Saya
                    </label>
                </div>

                <button type="submit" 
                        class="w-full bg-[#2563EB] hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-lg shadow-blue-500/30 transition duration-200 text-sm">
                    Masuk
                </button>
            </form>

            <!-- Separator Atau -->
            <div class="relative my-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-200"></div>
                </div>
                <div class="relative flex justify-center text-[10px] uppercase">
                    <span class="bg-white px-2 text-slate-400 font-bold">Atau</span>
                </div>
            </div>

            <!-- Tombol Google SSO -->
            <a href="{{ route('auth.google') }}" 
               class="w-full py-3 px-4 bg-white border border-slate-200 hover:bg-slate-50 font-bold text-xs text-slate-700 rounded-xl shadow-xs transition flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                <span>Lanjut dengan Google</span>
            </a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIconShow = document.getElementById('eyeIconShow');
            const eyeIconHide = document.getElementById('eyeIconHide');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIconShow.classList.add('hidden');
                eyeIconHide.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIconShow.classList.remove('hidden');
                eyeIconHide.classList.add('hidden');
            }
        }
    </script>
</body>
</html>