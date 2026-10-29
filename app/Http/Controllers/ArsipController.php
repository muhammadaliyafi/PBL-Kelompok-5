<?php

namespace App\Http\Controllers;

use App\Models\ArsipJudul;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = ArsipJudul::query();

        // Fitur Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('judul_proposal', 'like', "%{$search}%")
                    ->orWhere('nim', 'like', "%{$search}%");
            });
        }

        // Fitur Filter Tahun
        if ($request->filled('tahun') && !in_array($request->tahun, ['semua', 'Semua Tahun', ''])) {
            $query->where('tahun', $request->tahun);
        }

        $arsip = $query->orderBy('tahun', 'desc')->orderBy('id', 'desc')->get();

        // Deteksi layout berdasarkan URL
        if ($request->is('koorprodi*')) {
            $layout = 'layout.koorprodi';
        } elseif ($request->is('dosen*')) {
            $layout = 'layout.dosen';
        } else {
            if (view()->exists('layout.mahasiswa')) {
                $layout = 'layout.mahasiswa';
            } elseif (view()->exists('layouts.mahasiswa')) {
                $layout = 'layouts.mahasiswa';
            } else {
                $layout = 'layout.dosen';
            }
        }

        return view('pages.arsip', compact('arsip', 'layout'));
    }
}
