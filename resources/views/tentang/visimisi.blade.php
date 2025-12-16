@extends('layouts.user')

@section('title', 'Visi & Misi Perpustakaan')

@section('hero')
@include('partials.hero', [
    'title' => 'Visi & Misi Perpustakaan',
    'breadcrumb' => 'Home / Tentang Kami / Visi & Misi'
])
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 text-xs text-slate-700">
        <h2 class="text-sm font-semibold text-slate-900 mb-2">Visi</h2>
        <p class="mb-4">
            Menjadi pusat sumber belajar digital yang mudah diakses, aman, dan
            mendukung prestasi siswa SMPN 8 Bengkalis.
        </p>

        <h2 class="text-sm font-semibold text-slate-900 mb-2">Misi</h2>
        <ul class="list-disc pl-4 space-y-1">
            <li>Menyediakan koleksi digital yang relevan dengan kurikulum.</li>
            <li>Memudahkan siswa dan guru mengakses bahan belajar secara offline.</li>
            <li>Mendorong budaya literasi dan minat baca di lingkungan sekolah.</li>
            <li>Menjaga keamanan dan kenyamanan penggunaan jaringan perpustakaan.</li>
        </ul>
    </div>
</div>
@endsection
