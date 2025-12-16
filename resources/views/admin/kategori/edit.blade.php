@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="max-w-3xl mx-auto py-6 space-y-6">

        <div class="flex items-center justify-between gap-3">
            <div>
                <h1 class="text-base md:text-lg font-semibold text-slate-900">
                    Edit Kategori
                </h1>
                <p class="text-xs text-slate-500">
                    Perbarui data kategori yang sudah ada.
                </p>
            </div>

            <a href="{{ route('admin.kategori.index') }}"
               class="inline-flex items-center gap-1 px-3 py-2 rounded-lg border border-slate-200
                      text-xs text-slate-600 hover:bg-slate-50">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <span>Kembali</span>
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
            <form method="POST" action="{{ route('admin.kategori.update', $category->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- NAMA --}}
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Nama Kategori <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                           class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200
                                  focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    @error('name')
                    <p class="mt-1 text-[11px] text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Deskripsi (opsional)
                    </label>
                    <textarea name="description" rows="3"
                              class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200
                                     focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-[11px] text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-emerald-600
                                   hover:bg-emerald-700 text-xs font-semibold text-white">
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
