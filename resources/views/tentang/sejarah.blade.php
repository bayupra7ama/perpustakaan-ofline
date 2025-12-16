@extends('layouts.user')

@section('title', 'Sejarah Perpustakaan')

@section('hero')
@include('partials.hero', [
    'title' => 'Sejarah Perpustakaan Sekolah',
    'breadcrumb' => 'Home / Tentang Kami / Sejarah Perpustakaan'
])
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 text-xs leading-relaxed text-slate-700">
        <p class="mb-2">
            Tuliskan sejarah singkat perpustakaan di sini. Misalnya kapan pertama kali didirikan,
            bagaimana perkembangan koleksi buku, dan sejak kapan perpustakaan mulai beralih
            ke perpustakaan digital offline.
        </p>
        <p>
            Sementara ini teksnya masih dummy, nanti bisa kamu ganti setelah dapat data dari sekolah.
        </p>
    </div>
</div>
@endsection
