@extends('layouts.user')

@section('title', 'Tambah Panduan Guru • Perpustakaan SMPN 8 Bengkalis')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-6 space-y-5">

        <div>
            <h1 class="text-lg font-semibold text-slate-800">
                Tambah Buku Panduan Guru
            </h1>
            <p class="text-xs text-slate-500">
                Buku yang ditambahkan akan otomatis masuk kategori
                <span class="font-semibold text-[#00499c]">Panduan Guru</span>.
            </p>
        </div>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 text-xs rounded-xl px-4 py-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border p-6">
            <form action="{{ route('guru.panduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                {{-- JUDUL --}}
                <div>
                    <label class="block text-xs font-semibold mb-1">
                        Judul Buku <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" class="w-full border rounded-lg px-3 py-2 text-xs">
                </div>

                {{-- KATEGORI --}}
                <div>
                    <label class="block text-xs font-semibold mb-1">
                        Kategori
                    </label>

                    {{-- CHIP PANDUAN GURU (LOCKED) --}}
                    <div class="flex flex-wrap gap-2 mb-2">
                        <span
                            class="px-3 py-1 rounded-full text-[11px]
                   bg-blue-100 text-[#00499c]
                   border border-blue-200">
                            Panduan Guru
                        </span>
                    </div>

                    {{-- CHECKBOX KATEGORI TAMBAHAN --}}
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-xs">
                        @foreach ($categories as $category)
                            @if ($category->name !== 'Panduan Guru')
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                        class="rounded border-slate-300 text-[#00499c] focus:ring-[#0098d9]">
                                    {{ $category->name }}
                                </label>
                            @endif
                        @endforeach
                    </div>

                    <p class="text-[10px] text-slate-500 mt-2">
                        * Panduan Guru otomatis ditambahkan dan tidak dapat dihapus
                    </p>
                </div>


                {{-- GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold mb-1">
                            Penulis <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="penulis" class="w-full border rounded-lg px-3 py-2 text-xs">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold mb-1">
                            Penerbit
                        </label>
                        <input type="text" name="penerbit" class="w-full border rounded-lg px-3 py-2 text-xs">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold mb-1">
                            Tahun Terbit
                        </label>
                        <input type="number" name="tahun_terbit" class="w-full border rounded-lg px-3 py-2 text-xs">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold mb-1">
                            Kelas
                        </label>
                        <select name="kelas" class="w-full border rounded-lg px-3 py-2 text-xs">
                            <option value="">Umum</option>
                            <option value="7">Kelas 7</option>
                            <option value="8">Kelas 8</option>
                            <option value="9">Kelas 9</option>
                        </select>
                    </div>
                </div>

                {{-- FILE --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold mb-1">
                            File Buku (PDF)
                        </label>
                        <input type="file" name="file" class="text-xs">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold mb-1">
                            Sampul Buku
                        </label>
                        <input type="file" name="cover" class="text-xs">
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-lg
                       text-xs font-semibold bg-[#00499c] text-white hover:bg-[#0098d9]">
                    <span class="material-symbols-outlined text-[16px]">save</span>
                    Simpan Panduan Guru
                </button>

            </form>
        </div>
    </div>
@endsection
