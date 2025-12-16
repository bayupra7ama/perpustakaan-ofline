@extends('layouts.admin')

@section('title', 'Tambah Buku - Perpustakaan Digital Offline')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-4">

        <h1 class="text-lg font-semibold text-slate-800 mb-2">
            Tambah Buku Baru
        </h1>

        <a href="{{ route('admin.buku.index') }}" class="text-xs text-emerald-600 hover:underline">
            &larr; Kembali ke daftar buku
        </a>

        {{-- ALERT ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 text-xs rounded-lg px-3 py-2 mb-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM TAMBAH BUKU --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
            <form action="{{ route('admin.buku.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Judul --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Judul Buku <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="judul"
                        value="{{ old('judul') }}"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Mis: Biologi Kelas IX">
                </div>

                {{-- Penulis --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Penulis <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="penulis"
                        value="{{ old('penulis') }}"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Nama penulis">
                </div>

                {{-- Penerbit --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Penerbit
                    </label>
                    <input
                        type="text"
                        name="penerbit"
                        value="{{ old('penerbit') }}"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Nama penerbit (opsional)">
                </div>

                {{-- Tahun Terbit --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Tahun Terbit
                    </label>
                    <input
                        type="number"
                        name="tahun_terbit"
                        value="{{ old('tahun_terbit') }}"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Mis: 2024">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select
                        name="category_id"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">-- Pilih kategori --</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TOMBOL SIMPAN --}}
                <div class="pt-2">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 rounded-lg text-xs font-semibold bg-emerald-600 text-white hover:bg-emerald-700">
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
