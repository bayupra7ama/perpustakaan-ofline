@extends('layouts.admin')

@section('title', 'Manajemen Kategori • Perpustakaan SMPN 8 Bengkalis')

@section('content')
    <div class="max-w-6xl mx-auto py-6 space-y-6">

        {{-- JUDUL + TOMBOL TAMBAH --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-base md:text-lg font-semibold text-slate-900">
                    Manajemen Kategori
                </h1>
                <p class="text-xs text-slate-500">
                    Kelola daftar kategori buku di perpustakaan digital offline.
                </p>
            </div>

            <a href="{{ route('admin.kategori.create') }}"
               class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700
                      text-xs font-semibold text-white shadow-sm">
                <span class="material-symbols-outlined text-[18px]">add</span>
                <span>Tambah Kategori</span>
            </a>
        </div>

        {{-- ALERT BERHASIL --}}
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs px-3 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- KOTAK FILTER + TABEL --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4 space-y-4">

            {{-- PENCARIAN --}}
            <form method="GET" action="{{ route('admin.kategori.index') }}" class="flex flex-col sm:flex-row gap-2">
                <div class="relative flex-1">
                    <span class="material-symbols-outlined text-slate-400 text-[18px]
                                 absolute left-3 top-1/2 -translate-y-1/2">
                        search
                    </span>
                    <input
                        type="text"
                        name="q"
                        value="{{ $search ?? '' }}"
                        placeholder="Cari kategori berdasarkan nama..."
                        class="w-full pl-9 pr-3 py-2 text-xs rounded-lg border border-slate-200
                               focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    >
                </div>

                <button type="submit"
                        class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold
                               rounded-lg bg-slate-900 text-white hover:bg-slate-800">
                    Cari
                </button>
            </form>

            {{-- TABEL KATEGORI --}}
            <div class="overflow-x-auto">
                <table class="min-w-full text-xs text-left text-slate-700">
                    <thead>
                    <tr class="border-b border-slate-200 bg-slate-50">
                        <th class="px-3 py-2 font-semibold">#</th>
                        <th class="px-3 py-2 font-semibold">Nama Kategori</th>
                        <th class="px-3 py-2 font-semibold">Deskripsi</th>
                        <th class="px-3 py-2 font-semibold w-32 text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $index => $category)
                        <tr class="border-b border-slate-100 hover:bg-slate-50/60">
                            <td class="px-3 py-2 align-top">
                                {{ $categories->firstItem() + $index }}
                            </td>
                            <td class="px-3 py-2 align-top font-semibold text-slate-900">
                                {{ $category->name }}
                            </td>
                            <td class="px-3 py-2 align-top text-slate-600">
                                {{ $category->description ?: '-' }}
                            </td>
                            <td class="px-3 py-2 align-top">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.kategori.edit', $category->id) }}"
                                       class="inline-flex items-center justify-center w-7 h-7 rounded-lg
                                              bg-emerald-50 text-emerald-700 hover:bg-emerald-100">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.kategori.destroy', $category->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center justify-center w-7 h-7 rounded-lg
                                                       bg-rose-50 text-rose-600 hover:bg-rose-100">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-3 py-4 text-center text-slate-500">
                                Belum ada kategori. Silakan tambah kategori baru.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($categories->hasPages())
                <div class="pt-2 border-t border-slate-100">
                    {{ $categories->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection
