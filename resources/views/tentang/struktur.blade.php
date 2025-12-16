@extends('layouts.user')

@section('title', 'Struktur Organisasi Perpustakaan')

@section('hero')
@include('partials.hero', [
    'title' => 'Struktur Organisasi Perpustakaan',
    'breadcrumb' => 'Home / Tentang Kami / Struktur Organisasi'
])
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h2 class="text-base md:text-lg font-semibold text-slate-900 mb-3">
            Struktur Pengelola Perpustakaan
        </h2>
        <p class="text-xs text-slate-600 mb-4">
            Nanti bagian ini bisa kamu isi dengan struktur organisasi asli dari perpustakaan SMPN 8 Bengkalis.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
            <div class="border border-slate-200 rounded-xl p-3">
                <p class="text-[10px] uppercase text-slate-400 mb-1">Penanggung Jawab</p>
                <p class="font-semibold text-slate-800">Kepala Sekolah</p>
            </div>
            <div class="border border-slate-200 rounded-xl p-3">
                <p class="text-[10px] uppercase text-slate-400 mb-1">Koordinator Perpustakaan</p>
                <p class="font-semibold text-slate-800">Nama Koordinator</p>
            </div>
            <div class="border border-slate-200 rounded-xl p-3">
                <p class="text-[10px] uppercase text-slate-400 mb-1">Petugas Perpustakaan</p>
                <p class="font-semibold text-slate-800">Nama Petugas 1</p>
                <p class="font-semibold text-slate-800">Nama Petugas 2</p>
            </div>
        </div>
    </div>
</div>
@endsection
