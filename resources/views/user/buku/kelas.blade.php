@extends('layouts.user')

@section('title', "Buku Kelas $kelas - Perpustakaan SMPN 8 Bengkalis")

{{-- ================= HERO ================= --}}
@section('hero')
    <section class="relative h-40" style="background-color:#00499c">
        <div class="relative h-full flex flex-col items-center justify-center px-4">
            <p class="text-xs md:text-sm text-blue-100 mb-1 text-center">
                Buku Elektronik
            </p>
            <h1 class="text-2xl md:text-3xl font-bold text-white text-center">
                Kelas {{ $kelas }}
            </h1>
        </div>
    </section>
@endsection

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 md:p-6">

        {{-- BREADCRUMB --}}
        <div class="mb-5 text-xs text-slate-500">
            <a href="{{ route('user.dashboard') }}" class="hover:underline">
                Beranda
            </a>
            <span class="mx-1">›</span>
            <a href="{{ route('user.buku.index') }}" class="hover:underline">
                Semua Buku
            </a>
            <span class="mx-1">›</span>
            <span class="font-semibold text-[#00499c]">
                Kelas {{ $kelas }}
            </span>
        </div>

        @if ($books->isEmpty())
            <p class="text-sm text-slate-500">
                Belum ada data buku untuk Kelas {{ $kelas }}.
            </p>
        @else
            {{-- GRID BUKU (SAMA DENGAN HALAMAN SEMUA BUKU) --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

                @foreach ($books as $book)
                    <a href="{{ route('user.buku.show', $book->id) }}"
                        class="group bg-white rounded-2xl border border-slate-200 shadow-sm
                              overflow-hidden flex flex-col
                              hover:shadow-md hover:ring-1 transition"
                        style="--tw-ring-color:#0098d9">

                        {{-- COVER --}}
                        <div class="h-40 md:h-48 bg-slate-100 overflow-hidden">
                            @if ($book->cover_path)
                                <img src="{{ asset('storage/' . $book->cover_path) }}" alt="{{ $book->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-xs text-slate-400">
                                    Tidak ada sampul
                                </div>
                            @endif
                        </div>

                        {{-- INFO --}}
                        <div class="px-4 pt-3 pb-4 flex-1 flex flex-col text-left">
                            <p class="text-xs font-semibold line-clamp-2 transition" style="color:#00499c">
                                {{ $book->judul ?? 'Judul belum diisi' }}
                            </p>

                            <p class="text-[11px] text-slate-500 mt-1 mb-2">
                                {{ $book->penulis ?? 'Penulis tidak diketahui' }}
                            </p>

                            {{-- KATEGORI --}}
                            <div class="flex flex-wrap gap-1 mt-auto">
                                @foreach ($book->categories as $category)
                                    <span
                                        class="text-[10px] px-2 py-0.5 rounded-full
                                               bg-blue-50 border"
                                        style="border-color:#0098d9;color:#00499c">
                                        {{ $category->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @endif
    </section>
@endsection
