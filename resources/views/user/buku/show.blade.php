@extends('layouts.user')

@section('title', $book->judul . ' - Perpustakaan SMPN 8 Bengkalis')

@section('content')
    <section class="max-w-6xl mx-auto px-4 py-10">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- SAMPUL --}}
                <div class="md:col-span-1">
                    <div class="aspect-[3/4] bg-slate-100 rounded-xl overflow-hidden">
                        @if ($book->cover_path)
                            <img src="{{ asset('storage/' . $book->cover_path) }}" alt="{{ $book->judul }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-sm text-slate-400">
                                Tidak ada sampul
                            </div>
                        @endif
                    </div>
                </div>

                {{-- INFO BUKU --}}
                <div class="md:col-span-2 flex flex-col">

                    <h1 class="text-xl md:text-2xl font-semibold mb-2">
                        {{ $book->judul }}
                    </h1>

                    <p class="text-sm text-slate-600 mb-3">
                        oleh <span class="font-medium">{{ $book->penulis }}</span>
                    </p>

                    {{-- KATEGORI --}}
                    <div class="mb-4">
                        <p class="text-sm text-slate-600 mb-1">
                            Kategori:
                        </p>

                        <div class="flex flex-wrap gap-2">
                            @foreach ($book->categories as $category)
                                <span
                                    class="px-3 py-1 rounded-full text-xs
                                           bg-blue-50 border"
                                    style="border-color:#0098d9;color:#00499c">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- META --}}
                    <div class="grid grid-cols-2 gap-y-2 text-sm text-slate-700 mb-6">
                        <div>
                            <span class="text-slate-500">Tahun Terbit:</span>
                            {{ $book->tahun_terbit ?? '-' }}
                        </div>

                        <div>
                            <span class="text-slate-500">Kelas:</span>
                            {{ strtoupper($book->kelas ?? '-') }}
                        </div>
                    </div>

                    {{-- TOMBOL --}}

                    {{-- TOMBOL --}}
                    <div class="mt-auto flex flex-wrap gap-3">

                        {{-- BACA --}}
                        @if ($book->file_path)
                            <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank"
                                class="inline-flex items-center gap-2
                                      px-6 py-3 rounded-xl
                                      text-white text-sm font-semibold
                                      transition"
                                style="background-color:#00499c" onmouseover="this.style.backgroundColor='#0098d9'"
                                onmouseout="this.style.backgroundColor='#00499c'">
                                <span class="material-symbols-outlined text-[20px]">
                                    menu_book
                                </span>
                                Baca
                            </a>
                        @else
                            <span class="inline-block text-sm text-slate-400">
                                File buku belum tersedia
                            </span>
                        @endif

                        {{-- UNDUH --}}
                        <a href="{{ route('user.buku.download', $book->id) }}" data-no-loader
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border text-sm font-semibold transition"
                            style="border-color:#00499c;color:#00499c" onmouseover="this.style.backgroundColor='#e6f2ff'"
                            onmouseout="this.style.backgroundColor='transparent'">

                            <span class="material-symbols-outlined text-[20px]">
                                download
                            </span>
                            Unduh Buku
                        </a>

                    </div>


                </div>
            </div>
        </div>

    </section>
@endsection
