@extends('layouts.admin')

@section('title', 'Koleksi Buku - Admin')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-4">

        <h1 class="text-lg font-semibold text-slate-800 mb-2">
            Manajemen Koleksi Buku
        </h1>

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="mb-3 text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Bar atas: cari + tombol tambah --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <form method="GET" class="w-full md:w-1/2">
                <div class="relative">
                    <input type="text" name="q" value="{{ $q }}"
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                           placeholder="Cari judul atau penulis...">
                </div>
            </form>

            <a href="{{ route('admin.buku.create') }}"
               class="inline-flex items-center gap-2 px-3 py-2 text-xs font-semibold rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">
                + Tambah Buku
            </a>
        </div>

        {{-- Tabel buku --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 mt-3 overflow-hidden">
            <table class="min-w-full text-xs">
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
                        <tr class="border-t border-slate-100">
                            <td class="px-4 py-2">
                                {{ $books->firstItem() + $index }}
                            </td>

                            {{-- ganti title -> judul --}}
                            <td class="px-4 py-2 font-semibold text-slate-800">
                                {{ $book->judul }}
                            </td>

                            {{-- ganti author -> penulis --}}
                            <td class="px-4 py-2 text-slate-600">
                                {{ $book->penulis }}
                            </td>

                            <td class="px-4 py-2 text-slate-600">
                                {{ $book->category->name ?? '-' }}
                            </td>

                            {{-- ganti year -> tahun_terbit --}}
                            <td class="px-4 py-2 text-slate-600">
                                {{ $book->tahun_terbit ?? '-' }}
                            </td>

                            <td class="px-4 py-2 text-right space-x-1">
                                <a href="{{ route('admin.buku.edit', $book) }}"
                                   class="inline-flex items-center px-2 py-1 rounded border border-slate-200 text-[11px] text-slate-600 hover:bg-slate-50">
                                    Edit
                                </a>
                                <form action="{{ route('admin.buku.destroy', $book) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-2 py-1 rounded border border-red-200 text-[11px] text-red-600 hover:bg-red-50">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-slate-500">
                                Belum ada data buku. Silakan tambah buku baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="px-4 py-3 border-t border-slate-100">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
