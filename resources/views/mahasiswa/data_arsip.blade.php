@extends('layouts.app')

@section('title', 'Data Arsip Judul')

@section('content')
<div class="space-y-6">

    <!-- Header Page -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Data Arsip Judul TA</h2>
            <p class="text-xs text-slate-500 mt-1">Bank pencarian referensi judul dan topik proposal Tugas Akhir yang telah terarsip.</p>
        </div>
        <div class="flex items-center space-x-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-xl border border-blue-100">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <span class="text-xs font-semibold">Total Arsip: {{ $total_arsip ?? 0 }} Judul</span>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
        <form method="GET" action="{{ route('mahasiswa.data-arsip') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3">
            
            <!-- Input Text Search -->
            <div class="md:col-span-6 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari kata kunci judul, nama, atau NIM..." 
                       class="w-full pl-10 pr-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
            </div>

            <!-- Filter Topik -->
            <div class="md:col-span-3">
                <select name="topik" onchange="this.form.submit()" 
                        class="w-full px-3 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-700 font-medium">
                    <option value="">-- Semua Topik --</option>
                    @if(!empty($list_topik))
                        @foreach($list_topik as $t)
                            <option value="{{ $t }}" {{ request('topik') == $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Filter Tahun -->
            <div class="md:col-span-3">
                <select name="tahun" onchange="this.form.submit()" 
                        class="w-full px-3 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-700 font-medium">
                    <option value="">-- Semua Tahun --</option>
                    @if(!empty($list_tahun))
                        @foreach($list_tahun as $th)
                            <option value="{{ $th }}" {{ request('tahun') == $th ? 'selected' : '' }}>{{ $th }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        </form>
    </div>

    <!-- Tabel Data Arsip -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200/80 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-5">No</th>
                        <th class="py-3.5 px-5">Mahasiswa</th>
                        <th class="py-3.5 px-5">NIM</th>
                        <th class="py-3.5 px-5">Judul Proposal</th>
                        <th class="py-3.5 px-5">Topik</th>
                        <th class="py-3.5 px-5 text-center">Tahun</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($arsip as $index => $item)
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-4 px-5 text-slate-400 font-medium">
                                {{ $arsip->firstItem() + $index }}
                            </td>
                            <td class="py-4 px-5">
                                <span class="font-bold text-slate-800 block">{{ $item->nama }}</span>
                            </td>
                            <td class="py-4 px-5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[11px] font-medium bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ $item->nim }}
                                </span>
                            </td>
                            <td class="py-4 px-5 max-w-md">
                                <p class="text-slate-800 font-medium leading-relaxed">{{ $item->judul }}</p>
                            </td>
                            <td class="py-4 px-5 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-200/60">
                                    {{ $item->topik }}
                                </span>
                            </td>
                            <td class="py-4 px-5 text-center whitespace-nowrap">
                                <span class="font-bold text-slate-600">{{ $item->tahun }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="font-medium text-slate-600">Belum ada data arsip judul yang ditemukan.</p>
                                <p class="text-[11px] text-slate-400 mt-0.5">Coba ubah kata kunci atau pilihan filter Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(!empty($arsip) && $arsip->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                {{ $arsip->links() }}
            </div>
        @endif
    </div>

</div>
@endsection