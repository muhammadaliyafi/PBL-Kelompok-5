<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIPETA POLITALA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#eef5ff] min-h-screen flex items-center justify-center p-4">

    <!-- Container Utama Split 2 Kolom -->
    <div class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 gap-8 items-center p-4">
        
        <!-- KOLOM KIRI: Gambar Ilustrasi & Judul -->
        <div class="flex flex-col items-center justify-center text-center space-y-4">
            <div class="w-full max-w-xs">
                <img src="https://img.freepik.com/free-vector/online-learning-concept-illustration_114360-4415.jpg" alt="Ilustrasi SIPETA" class="w-full h-auto mix-blend-multiply drop-shadow-sm">
            </div>
            <div>
                <h1 class="text-xl font-bold text-slate-800 tracking-tight leading-snug">
                    Sistem Pengajuan<br>Tugas Akhir
                </h1>
                <p class="text-xs text-slate-500 mt-1 font-medium">
                    Politeknik Negeri Tanah Laut
                </p>
            </div>
        </div>

        <!-- KOLOM KANAN: Card Form Login -->
        <div class="bg-white rounded-3xl shadow-xl shadow-blue-900/5 p-8 border border-white">
            <h2 class="text-xl font-bold text-slate-900 tracking-tight mb-0.5">
                Masuk ke Akun Anda
            </h2>
            <p class="text-[11px] text-slate-400 mb-6 font-medium">
                Silahkan Login untuk melanjutkan
            </p>

            <!-- Alert Error Validasi -->
            @if ($errors->any())
                <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation text-rose-500"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Input Email/Akun -->
                <div>
                    <label class="block text-[11px] font-semibold text-slate-700 mb-1.5">
                        Email/akun pengguna
                    </label>
                    <input type="text" name="username" required autofocus
                        placeholder="Masukkan Email/akun pengguna"
                        value="{{ old('username') }}"
                        class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 placeholder:text-slate-300">
                </div>

                <!-- Input Password -->
                <div>
                    <label class="block text-[11px] font-semibold text-slate-700 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" id="passwordInput" name="password" required
                            placeholder="Masukkan password"
                            class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 placeholder:text-slate-300 pr-9">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 text-xs">
                            <i id="eyeIcon" class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center pt-0.5">
                    <input type="checkbox" id="remember" name="remember" 
                        class="w-3.5 h-3.5 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-[11px] text-slate-500 cursor-pointer select-none">
                        Ingat Saya
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                    class="w-full mt-2 bg-[#3b82f6] hover:bg-blue-600 active:bg-blue-700 text-white font-medium py-2.5 rounded-xl text-xs shadow-md shadow-blue-500/20 transition-all">
                    Masuk
                </button>
            </form>
        </div>

    </div>

    <!-- Script Toggle Password -->
    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>