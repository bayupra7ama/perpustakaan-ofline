@extends('layouts.admin')

@section('title', 'Edit Buku - Perpustakaan Digital Offline')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-5">

        {{-- HEADER --}}
        <div>
            <h1 class="text-lg font-semibold text-slate-800">
                Edit Data Buku
            </h1>
            <a href="{{ route('admin.buku.index') }}" class="text-xs text-emerald-600 hover:underline">
                &larr; Kembali ke daftar buku
            </a>
        </div>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 text-xs rounded-xl px-4 py-3">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <form action="{{ route('admin.buku.update', $book) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                {{-- JUDUL --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Judul Buku <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" value="{{ old('judul', $book->judul) }}"
                        class="w-full border rounded-lg px-3 py-2 text-xs border-slate-200">
                </div>

                {{-- GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    {{-- PENULIS --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Penulis <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}"
                            class="w-full border rounded-lg px-3 py-2 text-xs border-slate-200">
                    </div>

                    {{-- PENERBIT --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Penerbit
                        </label>
                        <input type="text" name="penerbit" value="{{ old('penerbit', $book->penerbit) }}"
                            class="w-full border rounded-lg px-3 py-2 text-xs border-slate-200">
                    </div>

                    {{-- TAHUN --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Tahun Terbit
                        </label>
                        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}"
                            class="w-full border rounded-lg px-3 py-2 text-xs border-slate-200">
                    </div>

                    {{-- KELAS --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Kelas
                        </label>
                        <select name="kelas" class="w-full border rounded-lg px-3 py-2 text-xs border-slate-200">
                            <option value="">-- Pilih Kelas --</option>
                            <option value="7" {{ old('kelas', $book->kelas) == '7' ? 'selected' : '' }}>Kelas 7
                            </option>
                            <option value="8" {{ old('kelas', $book->kelas) == '8' ? 'selected' : '' }}>Kelas 8
                            </option>
                            <option value="9" {{ old('kelas', $book->kelas) == '9' ? 'selected' : '' }}>Kelas 9
                            </option>
                            <option value="umum" {{ old('kelas', $book->kelas) == 'umum' ? 'selected' : '' }}>Umum
                            </option>
                        </select>
                    </div>
                </div>

                {{-- KATEGORI (CHECKBOX INTUITIF) --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-2">
                        Kategori Buku <span class="text-red-500">*</span>
                    </label>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                        @foreach ($categories as $category)
                            <label
                                class="flex items-center gap-2 px-3 py-2 rounded-lg border text-xs cursor-pointer
                                   {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray()))
                                       ? 'bg-emerald-50 border-emerald-400 text-emerald-700'
                                       : 'border-slate-200 hover:bg-slate-50' }}">

                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="hidden peer"
                                    {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray())) ? 'checked' : '' }}>

                                <span
                                    class="h-4 w-4 rounded border flex items-center justify-center
                                         peer-checked:bg-emerald-600 peer-checked:border-emerald-600">
                                    <span
                                        class="material-symbols-outlined text-[14px] text-white hidden peer-checked:block">
                                        check
                                    </span>
                                </span>

                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- FILE & COVER --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-xs font-semibold mb-1">File Buku (PDF)</label>
                        <input type="file" name="file" accept="application/pdf" class="w-full text-xs">
                        @if ($book->file_path)
                            <p class="text-[10px] text-slate-500 mt-1">
                                File lama tersimpan
                            </p>
                        @endif
                    </div>

                    <div>
                        <label class="block text-xs font-semibold mb-1">Sampul Buku</label>
                        <input type="file" name="cover" accept="image/*" class="w-full text-xs">
                        @if ($book->cover_path)
                            <p class="text-[10px] text-slate-500 mt-1">
                                Sampul lama tersimpan
                            </p>
                        @endif
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="pt-3">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-lg
                               text-xs font-semibold bg-emerald-600 text-white hover:bg-emerald-700">
                        <span class="material-symbols-outlined text-[16px]">save</span>
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
