@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
    <div>
        <label class="block mb-1 text-slate-700">Kategori</label>
        <select name="category_id"
                class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $book->category_id ?? null) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="mt-1 text-[11px] text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-1 text-slate-700">Judul Buku</label>
        <input type="text" name="judul"
               value="{{ old('judul', $book->judul ?? '') }}"
               class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
        @error('judul')
            <p class="mt-1 text-[11px] text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-1 text-slate-700">Penulis</label>
        <input type="text" name="penulis"
               value="{{ old('penulis', $book->penulis ?? '') }}"
               class="w-full border border-slate-200 rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 text-slate-700">Penerbit</label>
        <input type="text" name="penerbit"
               value="{{ old('penerbit', $book->penerbit ?? '') }}"
               class="w-full border border-slate-200 rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 text-slate-700">Tahun Terbit</label>
        <input type="text" name="tahun_terbit"
               value="{{ old('tahun_terbit', $book->tahun_terbit ?? '') }}"
               class="w-full border border-slate-200 rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 text-slate-700">Kelas</label>
        <input type="text" name="kelas"
               value="{{ old('kelas', $book->kelas ?? '') }}"
               class="w-full border border-slate-200 rounded-lg px-3 py-2">
    </div>
</div>
