@extends('layouts.user')

@section('title', "Buku Kelas $kelas - Perpustakaan SMPN 8 Bengkalis")

@section('hero')
<section class="relative h-40 bg-amber-500">
    <div class="relative h-full flex flex-col items-center justify-center px-4">
        <p class="text-xs md:text-sm text-amber-100 mb-1 text-center">
            Buku Elektronik
        </p>
        <h1 class="text-2xl md:text-3xl font-bold text-white text-center">
            Kelas {{ $kelas }}
        </h1>
    </div>
</section>
@endsection

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 md:p-6">
        @if($books->isEmpty())
            <p class="text-sm text-slate-500">
                Belum ada data buku untuk Kelas {{ $kelas }}.
            </p>
        @else
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($books as $book)
                    <div class="bg-slate-50 rounded-xl border border-slate-100 overflow-hidden flex flex-col">
                        <div class="h-32 md:h-40 bg-slate-100 flex items-center justify-center">
                            <span class="text-[11px] text-slate-400">
                                Sampul Buku
                            </span>
                        </div>
                        <div class="px-3 pt-2 pb-3 flex-1 flex flex-col">
                            <p class="text-xs font-semibold text-slate-900 line-clamp-2">
                                {{ $book->judul ?? 'Judul belum diisi' }}
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1 mb-2">
                                {{ $book->pengarang ?? 'Penulis tidak diketahui' }}
                            </p>

                            {{-- SESUAIKAN NAMA KOLOM FILE / LINK --}}
                            @if(!empty($book->file_path))
                                <a href="{{ asset('storage/'.$book->file_path) }}"
                                   class="mt-auto inline-flex items-center justify-center text-[11px] px-2 py-1.5 rounded-lg bg-amber-500 text-white hover:bg-amber-600">
                                    Baca / Unduh
                                </a>
                            @else
                                <span class="mt-auto text-[10px] text-slate-400">
                                    File belum tersedia
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
