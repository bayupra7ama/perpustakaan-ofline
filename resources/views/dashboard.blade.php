@extends('layouts.admin')

@section('title', 'Dashboard Admin • Perpustakaan SMPN 8 Bengkalis')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">

        {{-- ===================== RINGKASAN SISTEM ===================== --}}
        <section>
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Ringkasan Sistem</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- Total Buku --}}
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-xs text-slate-500">Total Buku</p>
                    <p class="text-2xl font-semibold">{{ $stats['total_buku'] }}</p>
                </div>

                {{-- Total Kategori --}}
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-xs text-slate-500">Total Kategori</p>
                    <p class="text-2xl font-semibold">{{ $stats['total_kategori'] }}</p>
                </div>

                {{-- Total Pengguna --}}
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-xs text-slate-500">Total Pengguna</p>
                    <p class="text-2xl font-semibold">{{ $stats['total_user'] }}</p>
                </div>

                {{-- Total Unduhan --}}
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-xs text-slate-500">Total Unduhan</p>
                    <p class="text-2xl font-semibold">{{ $stats['total_unduhan'] }}</p>
                </div>

            </div>
        </section>

        {{-- ===================== BUKU TERBARU ===================== --}}
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            {{-- Kartu: Buku Terbaru --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-semibold text-slate-800">
                        Buku Terbaru Ditambahkan
                    </h3>
                    {{-- kalau nanti pakai route koleksi buku admin --}}
                    <a href="{{ route('admin.buku.index') }}"
                       class="text-[11px] text-emerald-600 hover:underline">
                        Lihat semua
                    </a>
                </div>

                <div class="divide-y divide-slate-100 text-xs">
                    @forelse($latestBooks as $book)
                        <div class="py-2 flex flex-col">
                            <span class="font-semibold text-slate-800">
                                {{ $book['judul'] }}
                            </span>
                            <span class="text-slate-500">
                                {{ $book['kategori'] }} • {{ $book['penulis'] }} • {{ $book['tahun'] }}
                            </span>
                        </div>
                    @empty
                        <p class="py-3 text-slate-500 text-xs">
                            Belum ada data buku terbaru.
                        </p>
                    @endforelse
                </div>
            </div>

            {{-- Kartu: Aktivitas Unduhan Terakhir --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-semibold text-slate-800">
                        Aktivitas Unduhan Terakhir
                    </h3>
                    {{-- nanti bisa diarahkan ke halaman log unduhan --}}
                    <span class="text-[11px] text-slate-400">
                        Log singkat
                    </span>
                </div>

                <div class="divide-y divide-slate-100 text-xs">
                    @forelse($recentDownloads as $log)
                        <div class="py-2">
                            <p class="font-semibold text-slate-800">
                                {{ $log['judul'] }}
                            </p>
                            <p class="text-slate-500">
                                {{ $log['user'] }} • {{ $log['waktu'] }}
                            </p>
                        </div>
                    @empty
                        <p class="py-3 text-slate-500 text-xs">
                            Belum ada aktivitas unduhan terbaru.
                        </p>
                    @endforelse
                </div>
            </div>

        </section>

    </div>
@endsection
