@if ($books->isEmpty())
    <div class="text-center text-slate-500 text-sm py-12">
        Tidak ada buku ditemukan.
    </div>
@else
    {{-- GRID BUKU --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach ($books as $book)
            <a href="{{ route('user.buku.show', $book->id) }}"
                class="group bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden
                       flex flex-col hover:shadow-md transition
                       hover:ring-1 hover:ring-[#0098d9]/40">

                {{-- COVER --}}
                <div class="h-44 bg-slate-100 overflow-hidden">
                    @if ($book->cover_path)
                        <img src="{{ asset('storage/' . $book->cover_path) }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition">
                    @else
                        <div class="h-full flex items-center justify-center text-xs text-slate-400">
                            Tidak ada sampul
                        </div>
                    @endif
                </div>

                {{-- INFO --}}
                <div class="p-4 flex-1 flex flex-col">
                    <p
                        class="text-sm font-semibold line-clamp-2
                               transition">
                        {{ $book->judul }}
                    </p>
                    <p class="text-xs text-slate-500 mb-2">
                        {{ $book->penulis }}
                    </p>

                    {{-- KATEGORI --}}
                    <div class="flex flex-wrap gap-1">
                        @foreach ($book->categories as $cat)
                            <span
                                class="px-2 py-0.5 rounded-full text-[10px]
                                       bg-blue-50 text-[#00499c]
                                       border border-blue-200">
                                {{ $cat->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{-- PAGINATION --}}
    <div class="mt-8">
        {{ $books->links() }}
    </div>
@endif
