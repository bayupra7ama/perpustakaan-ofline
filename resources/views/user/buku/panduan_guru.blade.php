@extends('layouts.user')

@section('title', 'Panduan Guru • Perpustakaan SMPN 8 Bengkalis')

@section('content')

    {{-- HEADER --}}
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold">Panduan Guru</h1>
            <p class="text-sm text-slate-500">Buku panduan pembelajaran</p>
        </div>

        @if (auth()->user()->role === 'guru')
            <a href="{{ route('guru.panduan.create') }}" class="bg-[#00499c] text-white px-4 py-2 rounded-lg text-sm">
                + Tambah
            </a>
        @endif
    </div>

    {{-- FILTER --}}
    <form id="filterForm" class="grid md:grid-cols-3 gap-4 bg-white p-4 rounded-xl border mb-6">

        <input type="text" name="q" value="{{ request('q') }}" placeholder="Judul / penulis"
            class="border rounded-lg px-3 py-2 text-sm">

        <select name="kelas" class="border rounded-lg px-3 py-2 text-sm">
            <option value="">Semua Kelas</option>
            <option value="7">Kelas 7</option>
            <option value="8">Kelas 8</option>
            <option value="9">Kelas 9</option>
            <option value="umum">Umum</option>
        </select>

        <button type="submit" class="bg-[#00499c] text-white rounded-lg px-4 py-2 text-sm">
            Terapkan
        </button>
    </form>

    {{-- RESULT --}}
    <div id="bookResult">
        @include('user.buku.partials.list', ['books' => $books])
    </div>

    {{-- SCRIPT AJAX --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('filterForm');
            const result = document.getElementById('bookResult');
            let timer;

            function fetchData(url = "{{ route('user.panduan.index') }}") {
                const params = new URLSearchParams(new FormData(form));

                fetch(url + '?' + params.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        result.innerHTML = html;
                        bindPagination();
                    });
            }

            function debounce(fn) {
                clearTimeout(timer);
                timer = setTimeout(fn, 400);
            }

            // SEARCH
            form.querySelector('input[name="q"]').addEventListener('input', () => {
                debounce(fetchData);
            });

            // FILTER KELAS
            form.querySelector('select[name="kelas"]').addEventListener('change', () => {
                fetchData();
            });

            // SUBMIT
            form.addEventListener('submit', e => {
                e.preventDefault();
                fetchData();
            });

            // PAGINATION AJAX
            function bindPagination() {
                result.querySelectorAll('a[href*="page="]').forEach(a => {
                    a.addEventListener('click', e => {
                        e.preventDefault();
                        fetchData(a.href);
                    });
                });
            }

            bindPagination();
        });
    </script>

@endsection
