@extends('layouts.user')

@section('title', 'Beranda Pengguna - Perpustakaan SMPN 8 Bengkalis')

{{-- ===================== HERO ===================== --}}
@section('hero')
    <section class="relative h-64 md:h-[360px] lg:h-[420px]" style="background-color:#00499c">
        <div class="relative h-full flex flex-col items-center justify-center px-4">

            <p class="text-sm md:text-lg text-blue-100 mb-1 md:mb-2 text-center">
                Selamat datang di
            </p>

            <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white text-center leading-tight">
                Website Perpustakaan Digital Sekolah
            </h1>

            {{-- SEARCH BAR --}}
            <form action="{{ route('user.buku.index') }}" method="GET" class="mt-8 w-full max-w-3xl">
                <div class="relative">

                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="Cari judul / penulis buku..."
                        class="w-full pl-5 pr-12 py-3 md:py-4
                           text-sm md:text-base rounded-xl
                           bg-white text-slate-800 shadow-lg
                           border border-[#0098d9]
                           focus:outline-none
                           focus:ring-2 focus:ring-[#0098d9]
                           focus:border-[#0098d9]">

                    <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2
                           h-9 w-9 rounded-full
                           flex items-center justify-center
                           transition"
                        style="background-color:#0098d9" onmouseover="this.style.backgroundColor='#00499c'"
                        onmouseout="this.style.backgroundColor='#0098d9'">

                        <span class="material-symbols-outlined text-[22px] text-white">
                            search
                        </span>
                    </button>

                </div>
            </form>

        </div>
    </section>
@endsection


{{-- ===================== CONTENT ===================== --}}
@section('content')

    <section class="relative left-1/2 w-screen -translate-x-1/2 bg-slate-50 py-12">
        <div class="max-w-6xl mx-auto px-4 space-y-12">

            {{-- ===================== BUKU ELEKTRONIK ===================== --}}
            <div>
                <h2 class="text-xl md:text-2xl font-semibold text-center">
                    Buku Elektronik
                </h2>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                    {{-- KELAS --}}
                    @foreach ([7, 8, 9] as $kelas)
                        <a href="{{ route('user.buku.index', ['kelas' => $kelas]) }}"
                            class="group bg-white rounded-2xl border border-slate-200 shadow-sm p-6
                       flex flex-col items-center text-center
                       hover:-translate-y-1 hover:shadow-md transition">

                            <div class="h-20 w-20 rounded-2xl flex items-center justify-center
                           text-3xl font-bold text-white mb-3"
                                style="background:linear-gradient(135deg,#00499c,#0098d9)">
                                {{ $kelas }}
                            </div>

                            <p class="text-sm font-semibold text-slate-800">
                                Kelas {{ $kelas }}
                            </p>
                        </a>
                    @endforeach

                    {{-- PANDUAN GURU --}}
                    @if (!empty($panduanId))
                        <a href="{{ route('user.buku.index', ['categories' => [$panduanId]]) }}"
                            class="group bg-white rounded-2xl border border-slate-200 shadow-sm p-6
                       flex flex-col items-center text-center
                       hover:-translate-y-1 hover:shadow-md transition">

                            <div class="h-20 w-20 rounded-2xl bg-blue-50 flex items-center justify-center mb-3">
                                <span class="material-symbols-outlined text-[40px]" style="color:#00499c">
                                    school
                                </span>
                            </div>

                            <p class="text-sm font-semibold text-slate-800">
                                Panduan Guru
                            </p>
                        </a>
                    @endif

                </div>
            </div>

            {{-- ===================== KOLEKSI TERBARU ===================== --}}
            <div class="text-center w-full flex flex-col items-center">

                <h3 class="text-xl md:text-2xl font-semibold mb-2">
                    Koleksi Terbaru
                </h3>

                <p class="text-xs md:text-sm text-slate-500 max-w-3xl">
                    Daftar koleksi terbaru di perpustakaan digital sekolah.
                </p>

                {{-- TAG KATEGORI --}}
                <div class="mt-6 flex flex-wrap justify-center gap-3" id="categoryFilters">

                    {{-- SEMUA --}}
                    <button data-filter="all"
                        class="category-btn active px-4 py-1.5 rounded-full border bg-white text-[11px]"
                        style="border-color:#0098d9;color:#00499c">
                        SEMUA
                    </button>

                    {{-- KATEGORI --}}
                    @foreach ($recommendedCategories as $category)
                        <button data-filter="{{ Str::slug($category->name) }}"
                            class="category-btn px-4 py-1.5 rounded-full border bg-white text-[11px]"
                            style="border-color:#0098d9;color:#00499c">
                            {{ strtoupper($category->name) }}
                        </button>
                    @endforeach

                </div>


                {{-- GRID BUKU --}}
                <div id="bookGrid" class="mt-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 gap-6 w-full">

                    @forelse ($newBooks as $book)

                        @php
                            $categoryKeys = $book->categories
                                ->pluck('name')
                                ->map(fn($c) => Str::slug($c))
                                ->implode(',');
                        @endphp

                        <a href="{{ route('user.buku.show', $book) }}"
                            class="book-card group bg-white rounded-2xl border border-slate-200 shadow-sm
                  overflow-hidden flex flex-col hover:shadow-md hover:ring-1 transition"
                            style="--tw-ring-color:#0098d9" data-categories="{{ $categoryKeys }}">

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
                            <div class="px-4 pt-3 pb-4 space-y-1 flex-1 text-left">
                                <p class="text-xs font-semibold line-clamp-2" style="color:#00499c">
                                    {{ $book->judul }}
                                </p>

                                <p class="text-[11px] text-slate-500">
                                    {{ $book->penulis }}
                                </p>

                                {{-- BADGE --}}
                                <div class="flex flex-wrap gap-1 mt-2">
                                    @foreach ($book->categories as $category)
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-blue-50 border"
                                            style="border-color:#0098d9;color:#00499c">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </a>

                    @empty
                        <p class="col-span-full text-center text-sm text-slate-500">
                            Belum ada koleksi buku.
                        </p>
                    @endforelse

                </div>

            </div>

        </div>
    </section>

@endsection
