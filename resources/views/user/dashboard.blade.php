@extends('layouts.user')

@section('title', 'Beranda Pengguna - Perpustakaan SMPN 8 Bengkalis')

{{-- ===================== HERO ===================== --}}
@section('hero')
<section class="relative h-64 md:h-[360px] lg:h-[420px] bg-amber-500">
    <div class="relative h-full flex flex-col items-center justify-center px-4">
        <p class="text-sm md:text-lg text-white mb-1 md:mb-2 text-center">
            Selamat datang di
        </p>

        <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white text-center leading-tight">
            Website Perpustakaan Digital Sekolah
        </h1>

        {{-- SEARCH BAR --}}
        <form class="mt-8 w-full max-w-3xl">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Masukkan kata kunci untuk mencari koleksi..."
                    class="w-full pl-5 pr-12 py-3 md:py-4 text-sm md:text-base rounded-xl
                           bg-white text-slate-800 shadow-lg border border-amber-400
                           focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400">

                <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 h-8 w-8 rounded-full
                               flex items-center justify-center">
                    <span class="material-symbols-outlined text-[22px] text-slate-500">
                        search
                    </span>
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

{{-- ===================== KONTEN ===================== --}}
@section('content')

{{-- SEMUA KONTEN DISATUKAN DALAM 1 BLOK FULL-WIDTH --}}
<section class="relative left-1/2 w-screen -translate-x-1/2 bg-slate-50 py-12">
    <div class="max-w-6xl mx-auto px-4 space-y-12">

        {{-- ===================== BUKU ELEKTRONIK ===================== --}}
        <div>
            <h2 class="text-xl md:text-2xl font-semibold text-slate-900 text-center">
                Buku Elektronik
            </h2>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                {{-- Kelas 7 --}}
                <a href="{{ route('user.buku.kelas', 7) }}"
                   class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-6
                          flex flex-col items-center text-center hover:-translate-y-1 hover:shadow-md transition">
                    <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-cyan-400 to-emerald-400
                                flex items-center justify-center text-3xl font-bold text-white mb-3">
                        7
                    </div>
                    <p class="text-sm font-semibold text-slate-800">Kelas 7</p>
                </a>

                {{-- Kelas 8 --}}
                <a href="{{ route('user.buku.kelas', 8) }}"
                   class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-6
                          flex flex-col items-center text-center hover:-translate-y-1 hover:shadow-md transition">
                    <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-cyan-400 to-emerald-400
                                flex items-center justify-center text-3xl font-bold text-white mb-3">
                        8
                    </div>
                    <p class="text-sm font-semibold text-slate-800">Kelas 8</p>
                </a>

                {{-- Kelas 9 --}}
                <a href="{{ route('user.buku.kelas', 9) }}"
                   class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-6
                          flex flex-col items-center text-center hover:-translate-y-1 hover:shadow-md transition">
                    <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-cyan-400 to-emerald-400
                                flex items-center justify-center text-3xl font-bold text-white mb-3">
                        9
                    </div>
                    <p class="text-sm font-semibold text-slate-800">Kelas 9</p>
                </a>

                {{-- Panduan Guru --}}
                <a href="{{ route('user.buku.panduan') }}"
                   class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-6
                          flex flex-col items-center text-center hover:-translate-y-1 hover:shadow-md transition">
                    <div class="h-20 w-20 rounded-2xl bg-slate-100 flex items-center justify-center text-4xl mb-3">
                        <span class="material-symbols-outlined text-slate-500 text-[40px]">
                            school
                        </span>
                    </div>
                    <p class="text-sm font-semibold text-slate-800">Panduan Guru</p>
                </a>
            </div>
        </div>

        {{-- ===================== KOLEKSI TERBARU ===================== --}}
        <div class="text-center w-full flex flex-col items-center">
            <h3 class="text-xl md:text-2xl font-semibold text-slate-900 text-center mb-2">
                Koleksi Terbaru
            </h3>
            <p class="text-xs md:text-sm text-slate-500 text-center max-w-3xl mx-auto">
                Merupakan daftar koleksi terbaru di perpustakaan. Tidak semuanya buku baru, beberapa merupakan
                pembaruan data dan versi digital yang lebih lengkap. Selamat membaca!
            </p>

            {{-- KATEGORI / TAG PILLS --}}
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                @php
                    $tags = ['Children', 'Tulisan', 'Anatomi Manusia', 'Biologi',
                             'Bahasa Indonesia', 'Matematika', 'IPA', 'IPS'];
                @endphp

                @foreach($tags as $tag)
                    <button type="button"
                        class="px-4 py-1.5 rounded-full border border-slate-200 bg-white text-[11px] md:text-xs text-slate-600
                               hover:border-amber-400 hover:text-amber-700 hover:bg-amber-50 transition">
                        {{ strtoupper($tag) }}
                    </button>
                @endforeach
            </div>

            {{-- GRID KOLEKSI BUKU (DUMMY / NANTI BISA DIGANTI QUERY) --}}
            <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 gap-6 w-full">
                @for($i = 1; $i <= 5; $i++)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">
                        <div class="h-40 md:h-48 bg-slate-100 flex items-center justify-center">
                            <span class="text-[11px] text-slate-400">
                                Sampul Buku {{ $i }}
                            </span>
                        </div>
                        <div class="px-4 pt-3 pb-4 text-left">
                            <p class="text-xs font-semibold text-slate-900 mb-1">
                                Judul Buku Contoh {{ $i }}
                            </p>
                            <p class="text-[11px] text-slate-500">
                                Penulis Nama {{ $i }}
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

       {{-- ===================== STRUKTUR, SEJARAH, VISI MISI ===================== --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 space-y-8">

                {{-- STRUKTUR ORGANISASI --}}
                <div id="section-struktur">
                    <h2 class="text-base md:text-lg font-semibold text-slate-900 mb-4">
                        Struktur Organisasi Perpustakaan
                    </h2>
                    @include('partials.tentang.struktur')
                </div>

                {{-- GARIS PEMISAH HALUS --}}
                <div class="h-px w-full bg-slate-100"></div>

                {{-- SEJARAH PERPUSTAKAAN --}}
                <div id="section-sejarah">
                    <h2 class="text-base md:text-lg font-semibold text-slate-900 mb-4">
                        Sejarah Perpustakaan
                    </h2>
                    @include('partials.tentang.sejarah')
                </div>

                {{-- GARIS PEMISAH HALUS --}}
                <div class="h-px w-full bg-slate-100"></div>

                {{-- VISI & MISI --}}
                <div id="section-visimisi">
                    <h2 class="text-base md:text-lg font-semibold text-slate-900 mb-4">
                        Visi &amp; Misi Perpustakaan
                    </h2>
                    @include('partials.tentang.visimisi')
                </div>

            </div>


        {{-- ===================== PETA LOKASI SEKOLAH ===================== --}}
        <div id="peta" class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h2 class="text-base md:text-lg font-semibold text-slate-900 mb-4">
                Peta Lokasi SMPN 8 Bengkalis
            </h2>

            <div class="flex flex-col md:flex-row md:items-start gap-6">
                {{-- INFO ALAMAT --}}
                <div class="md:w-1/3 space-y-2 text-sm text-slate-700">
                    <p class="font-semibold">
                        Perpustakaan SMPN 8 Bengkalis
                    </p>
                    <p>
                        Jl. Pelajar Kelemantan, Kel. Kelemantan<br>
                        Kec. Bengkalis, Kab. Bengkalis<br>
                        Riau, Indonesia
                    </p>
                    <p class="text-xs text-slate-500">
                        Petunjuk: Peta ini dapat diakses ketika perangkat terhubung ke internet.
                        Untuk penggunaan perpustakaan digital offline, siswa cukup terhubung ke
                        jaringan Wi-Fi perpustakaan.
                    </p>
                </div>

                {{-- EMBED GOOGLE MAPS --}}
                <div class="md:flex-1 h-64 md:h-80 rounded-xl overflow-hidden border border-slate-200">
                    <iframe
                        src="https://www.google.com/maps?q=SMPN+8+Bengkalis&output=embed"
                        class="w-full h-full border-0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
