@extends('layouts.user')

@section('title', 'Semua Buku')

@section('content')

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-xl font-bold text-slate-800">
                Semua Koleksi Buku
            </h1>
            <p class="text-sm text-slate-500">
                Telusuri koleksi buku berdasarkan kelas, kategori, atau kata kunci
            </p>
        </div>

        @if (auth()->user()->role === 'guru')
            <a href="{{ route('guru.panduan.create') }}"
                class="inline-flex items-center gap-2
                  px-4 py-2 rounded-xl text-sm font-semibold
                  bg-[#00499c] text-white
                  hover:bg-[#0098d9] transition">
                <span class="material-symbols-outlined text-[20px]">
                    add
                </span>
                Tambah Panduan Guru
            </a>
        @endif

    </div>


    <form id="filterForm" method="GET"
        class="bg-white rounded-2xl border border-slate-200 p-5 mb-8
             grid grid-cols-1 md:grid-cols-4 gap-4 text-sm items-end">

      
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1">
                Cari Buku
            </label>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Judul / penulis..."
                class="w-full border rounded-xl px-4 py-2.5
                      focus:ring-2 focus:ring-[#0098d9]">
        </div>

    
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1">
                Kelas
            </label>
            <select name="kelas"
                class="w-full border rounded-xl px-4 py-2.5
                       focus:ring-2 focus:ring-[#0098d9]">
                <option value="">Semua Kelas</option>
                <option value="7" {{ request('kelas') == '7' ? 'selected' : '' }}>Kelas 7</option>
                <option value="8" {{ request('kelas') == '8' ? 'selected' : '' }}>Kelas 8</option>
                <option value="9" {{ request('kelas') == '9' ? 'selected' : '' }}>Kelas 9</option>
                <option value="umum" {{ request('kelas') == 'umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </div>

  
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1">
                Kategori
            </label>
            <input type="text" id="categorySearch" placeholder="Ketik kategori..."
                class="w-full border rounded-xl px-4 py-2.5">
        </div>

        <div>
            <button
                class="w-full bg-[#00499c] text-white rounded-xl px-4 py-2.5
           font-semibold hover:bg-[#0098d9] transition">
                Terapkan Filter
            </button>

        </div>

        <div class="md:col-span-4 relative">
            <div id="categorySuggestion"
                class="hidden absolute z-20 w-full bg-white border rounded-xl
                    max-h-44 overflow-y-auto shadow text-sm">
                @foreach ($categories as $cat)
                    <div data-id="{{ $cat->id }}" data-name="{{ $cat->name }}"
                        class="category-item px-4 py-2 cursor-pointer hover:bg-blue-50">
                        {{ $cat->name }}
                    </div>
                @endforeach
            </div>

            <div id="selectedCategories" class="flex flex-wrap gap-2 mt-2"></div>
            <div id="categoryInputs"></div>
        </div>
    </form>



    <div id="loading" class="hidden text-center py-12 text-[#0098d9]">
        Memuat buku...
    </div>

    <div id="bookResult">
        @include('user.buku.partials.list', ['books' => $books])
    </div>








@endsection
