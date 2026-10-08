<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Hak Akses - SIPETA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full text-center">
        <h2 class="text-2xl font-bold text-slate-800 mb-2">Masuk Sebagai</h2>
        <p class="text-xs text-slate-500 mb-6">Silakan pilih peran hak akses Anda untuk melanjutkan:</p>

        <form action="{{ route('set.role') }}" method="POST" class="space-y-3">
            @csrf
            
            <button type="submit" name="role" value="gugus_ta" 
                class="w-full py-3 px-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-xl font-semibold hover:bg-blue-600 hover:text-white transition-all text-left flex items-center justify-between text-sm">
                <span>Gugus Tugas Akhir (Gugus TA)</span>
                <span>➔</span>
            </button>

            <button type="submit" name="role" value="dospem" 
                class="w-full py-3 px-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl font-semibold hover:bg-emerald-600 hover:text-white transition-all text-left flex items-center justify-between text-sm">
                <span>Dosen Pembimbing / Penguji (Dospem)</span>
                <span>➔</span>
            </button>

            <button type="submit" name="role" value="koorprodi" 
                class="w-full py-3 px-4 bg-purple-50 border border-purple-200 text-purple-700 rounded-xl font-semibold hover:bg-purple-600 hover:text-white transition-all text-left flex items-center justify-between text-sm">
                <span>Koordinator Program Studi (Koorprodi)</span>
                <span>➔</span>
            </button>
        </form>
    </div>
</body>
</html>