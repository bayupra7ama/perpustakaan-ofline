@extends('layouts.admin')

@section('title', 'Koleksi Buku • Perpustakaan SMPN 8 Bengkalis')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-4">

        {{-- JUDUL --}}
        <h1 class="text-lg font-semibold text-slate-800">
            Manajemen Koleksi Buku
        </h1>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- TOP BAR --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <form method="GET" class="w-full md:w-1/2">
                <input type="text" name="q" value="{{ $q }}"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs
                          focus:ring-2 focus:ring-emerald-500"
                    placeholder="Cari judul atau penulis...">
            </form>

            <a href="{{ route('admin.buku.create') }}"
                class="inline-flex items-center gap-2 px-3 py-2
                  text-xs font-semibold rounded-lg
                  bg-emerald-600 text-white hover:bg-emerald-700">
                + Tambah Buku
            </a>
        </div>

        {{-- ================= MOBILE VIEW (CARD) ================= --}}
        <div class="space-y-3 md:hidden">
            @forelse($books as $book)
                <div class="bg-white rounded-xl border border-slate-100 p-4 space-y-2">

                    <div class="font-semibold text-slate-800">
                        {{ $book->judul }}
                    </div>

                    <div class="text-xs text-slate-600">
                        ✍ {{ $book->penulis }}
                    </div>

                    {{-- KATEGORI --}}
                    <div class="flex flex-wrap gap-1">
                        @forelse($book->categories as $category)
                            <span
                                class="text-[10px] px-2 py-0.5 rounded-full
                                     bg-emerald-50 text-emerald-700">
                                {{ $category->name }}
                            </span>
                        @empty
                            <span class="text-[10px] text-slate-400">Tanpa kategori</span>
                        @endforelse
                    </div>

                    <div class="text-xs text-slate-500">
                        Tahun: {{ $book->tahun_terbit ?? '-' }}
                    </div>

                    {{-- AKSI --}}
                    <div class="flex gap-2 pt-2">
                        <a href="{{ route('admin.buku.edit', $book) }}"
                            class="flex-1 text-center text-xs py-1.5 rounded border border-slate-200">
                            Edit
                        </a>

                        <form action="{{ route('admin.buku.destroy', $book) }}" method="POST" class="flex-1"
                            onsubmit="return confirm('Hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="w-full text-xs py-1.5 rounded border border-red-200 text-red-600">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center text-slate-500 text-xs py-6">
                    Belum ada data buku
                </div>
            @endforelse
        </div>

        {{-- ================= DESKTOP VIEW (TABLE) ================= --}}
        <div class="hidden md:block bg-white rounded-2xl shadow-sm border border-slate-100">

            <table class="w-full text-xs">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-4 py-2 text-left w-10">#</th>
                        <th class="px-4 py-2 text-left">Judul</th>
                        <th class="px-4 py-2 text-left">Penulis</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-left">Tahun</th>
                        <th class="px-4 py-2 text-right w-32">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($books as $index => $book)
                        <tr class="border-t border-slate-100 hover:bg-slate-50">
                            <td class="px-4 py-2">
                                {{ $books->firstItem() + $index }}
                            </td>

                            <td class="px-4 py-2 font-semibold text-slate-800">
                                {{ $book->judul }}
                            </td>

                            <td class="px-4 py-2 text-slate-600">
                                {{ $book->penulis }}
                            </td>

                            <td class="px-4 py-2">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($book->categories as $category)
                                        <span
                                            class="text-[10px] px-2 py-0.5 rounded-full
                                             bg-emerald-50 text-emerald-700">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>

                            <td class="px-4 py-2 text-slate-600">
                                {{ $book->tahun_terbit ?? '-' }}
                            </td>

                            <td class="px-4 py-2 text-right space-x-1">
                                <a href="{{ route('admin.buku.edit', $book) }}"
                                    class="px-2 py-1 text-[11px] border rounded">
                                    Edit
                                </a>

                                <form action="{{ route('admin.buku.destroy', $book) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 text-[11px] border border-red-200 text-red-600 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-slate-500">
                                Belum ada data buku
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="pt-3">
            {{ $books->links() }}
        </div>

    </div>
@endsection
