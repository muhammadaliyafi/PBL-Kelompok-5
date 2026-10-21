<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIPETA POLITALA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#eaf3ff] min-h-screen flex items-center justify-center font-sans p-4">

    <!-- Container Utama Split 2 Kolom -->
    <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-8 items-center p-6">
        
        <!-- KOLOM KIRI: Gambar Ilustrasi & Judul -->
        <div class="flex flex-col items-center justify-center text-center space-y-6">
            <div class="w-full max-w-xs sm:max-w-sm">
                <img src="https://img.freepik.com/free-vector/online-learning-concept-illustration_114360-4415.jpg" alt="Ilustrasi SIPETA" class="w-full h-auto mix-blend-multiply drop-shadow-sm">
            </div>

            <div class="space-y-1">
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Sistem Pengajuan</h1>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Tugas Akhir</h2>
                <p class="text-sm font-medium text-gray-600 pt-1">Politeknik Negeri Tanah Laut</p>
            </div>
        </div>

        <!-- KOLOM KANAN: Card Form Login -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-gray-100">
            
            <div class="mb-6 space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">Masuk ke Akun Anda</h3>
                <p class="text-xs text-gray-400">Silahkan Login untuk melanjutkan</p>
            </div>

            <!-- Form Login Direct Ke Dashboard -->
            <form action="{{ url('/') }}" method="GET" class="space-y-4">

                <!-- Input Email / Akun Pengguna -->
                <div>
                    <label class="block text-xs font-bold text-gray-800 mb-1.5">Email/akun pengguna</label>
                    <input type="text" name="email" placeholder="Masukkan Email/akun pengguna" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-xs text-gray-700 placeholder-gray-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>

                <!-- Input Password -->
                <div>
                    <label class="block text-xs font-bold text-gray-800 mb-1.5">Password</label>
                    <div class="relative">
                        <input type="password" id="passwordInput" name="password" placeholder="Masukkan password" class="w-full bg-white border border-gray-200 rounded-xl pl-4 pr-10 py-3 text-xs text-gray-700 placeholder-gray-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                        <button type="button" onclick="togglePassword()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 text-xs focus:outline-none">
                            <i id="eyeIcon" class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center space-x-2 pt-1">
                    <input type="checkbox" id="remember" name="remember" class="w-3.5 h-3.5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                    <label for="remember" class="text-[11px] text-gray-400 font-medium cursor-pointer">Ingat Saya</label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-[#4182e4] hover:bg-blue-600 text-white font-bold text-sm py-3 rounded-xl shadow-sm transition">
                        Masuk
                    </button>
                </div>
            </form>

        </div>

    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>