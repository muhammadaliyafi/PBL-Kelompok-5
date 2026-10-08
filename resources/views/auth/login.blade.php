<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIPETA POLITALA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-3xl shadow-xl flex flex-col md:flex-row max-w-4xl w-full overflow-hidden">
        
        <!-- Sisi Kiri (Ilustrasi & Info) -->
        <div class="hidden md:flex flex-col justify-center items-center w-1/2 bg-blue-100 p-8 text-center">
            <svg class="w-48 h-48 mb-4" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="80" fill="#DBEAFE"/>
                <rect x="55" y="60" width="90" height="70" rx="8" fill="#3B82F6"/>
                <path d="M70 80H130M70 95H110" stroke="white" stroke-width="4" stroke-linecap="round"/>
                <circle cx="140" cy="130" r="25" fill="#2563EB"/>
                <path d="M132 130L138 136L148 124" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h1 class="text-lg font-bold text-slate-800">Sistem Informasi Proposal Tugas Akhir</h1>
            <p class="text-xs text-slate-500 mt-1">Politeknik Negeri Tanah Laut</p>
        </div>

        <!-- Sisi Kanan (Form Login) -->
        <div class="w-full md:w-1/2 p-8 md:p-12 bg-white">
            <h2 class="text-2xl font-bold text-slate-800">Masuk ke Akun Anda</h2>
            <p class="text-xs text-slate-400 mb-6">Gunakan NIP, NIM, atau Email kampus untuk melanjutkan.</p>

            @if ($errors->has('username'))
                <div class="mb-4 p-3 bg-rose-100 text-rose-700 text-xs rounded-lg">
                    {{ $errors->first('username') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Username / NIM / NIP / Email</label>
                    <input type="text" name="username" value="{{ old('username') }}" required
                        class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan username/NIM/NIP/Email">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan password">
                </div>

                <div class="flex items-center text-xs text-slate-500">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg text-sm transition-all shadow-md">
                    Masuk
                </button>
            </form>
        </div>

    </div>
</body>
</html>