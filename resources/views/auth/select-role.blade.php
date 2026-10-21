<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Akses - SIPETA POLITALA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-[#eef5ff] min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-3xl shadow-xl p-8 max-w-md w-full text-center border border-white">
        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>

        <h2 class="text-xl font-bold text-slate-900 tracking-tight">Pilih Hak Akses Login</h2>
        <p class="text-xs text-slate-400 mt-1 mb-6">
            Akun Anda memiliki beberapa peran di sistem. Silakan pilih role untuk melanjutkan:
        </p>

        <div class="space-y-3">
            @foreach (session('user_roles', []) as $role)
                <form action="{{ route('set.role') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="{{ $role }}">
                    <button type="submit" 
                        class="w-full py-3 px-4 bg-slate-50 hover:bg-blue-50 border border-slate-200 hover:border-blue-300 text-slate-700 hover:text-blue-600 font-semibold rounded-2xl text-xs flex items-center justify-between transition-all group">
                        <span>
                            @if($role == 'gugus_ta') Gugus Tugas Akhir
                            @elseif($role == 'koorprodi') Koordinator Program Studi
                            @else Dosen Pembimbing
                            @endif
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </form>
            @endforeach
        </div>
    </div>

</body>
</html>