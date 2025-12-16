<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Perpustakaan Sekolah - SMPN 8 Bengkalis')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Icons --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300;400;600&display=swap" />
</head>
<body class="bg-slate-100 text-slate-900 antialiased">

    {{-- TOP BAR KUNING --}}
    <div class="bg-amber-500 text-white text-[11px]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-col sm:flex-row items-center justify-between gap-2">
            <div class="flex flex-wrap items-center gap-3">
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">call</span>
                    <span>0812-3456-7890</span>
                </span>
                <span class="hidden sm:inline-block w-px h-3 bg-amber-200"></span>
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">mail</span>
                    <span>smpn8bengkalis@gmail.com</span>
                </span>
            </div>
        </div>
    </div>

    {{-- NAVBAR PUTIH --}}
    <header class="bg-white text-slate-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

            {{-- LOGO + NAMA --}}
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-amber-500 flex items-center justify-center text-[10px] font-bold text-white">
                    LOGO
                </div>

                <div class="leading-tight">
                    <p class="text-sm font-semibold text-slate-900">
                        PERPUSTAKAAN SMPN 8 BENGKALIS
                    </p>
                    <p class="text-[11px] text-slate-500">
                        SMP NEGERI 8 BENGKALIS
                    </p>
                </div>
            </div>

            @php
                $user  = auth()->user();
                $isPeta = request()->routeIs('user.peta');
            @endphp

            {{-- MENU UTAMA --}}
            <nav class="hidden md:flex items-center gap-6 text-[15px] text-slate-700">

                {{-- BERANDA --}}
                <a href="{{ route('user.dashboard') }}"
                   class="{{ request()->routeIs('user.dashboard')
                        ? 'font-semibold text-amber-600 border-b-2 border-amber-600 pb-1'
                        : 'hover:text-amber-600' }}">
                    Beranda
                </a>

                {{-- TENTANG KAMI (dropdown) --}}
                <div class="relative group">
                    <button
                        class="flex items-center gap-1
                               {{ request()->routeIs('tentang.*')
                                    ? 'font-semibold text-amber-600 border-b-2 border-amber-600 pb-1'
                                    : 'hover:text-amber-600' }}">
                        Tentang Kami
                        <span class="material-symbols-outlined text-[18px] transition-transform group-hover:rotate-180">
                            expand_more
                        </span>
                    </button>

                    <div
                        class="absolute left-0 top-full w-56 bg-white rounded-xl shadow-lg border border-slate-200 py-2
                               opacity-0 invisible group-hover:opacity-100 group-hover:visible
                               transition duration-200 z-20">

                        <a href="{{ route('tentang.struktur') }}"
                           class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Struktur Organisasi
                        </a>
                        <a href="{{ route('tentang.sejarah') }}"
                           class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Sejarah Sekolah
                        </a>
                        <a href="{{ route('tentang.visimisi') }}"
                           class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Visi dan Misi
                        </a>
                    </div>
                </div>

                {{-- LAYANAN PERPUSTAKAAN (dropdown) --}}
                <div class="relative group">
                    <button class="flex items-center gap-1
                        {{ request()->routeIs('layanan.*') ? 'font-semibold text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-amber-600' }}">
                        Layanan Perpustakaan
                        <span class="material-symbols-outlined text-[18px] transition-transform group-hover:rotate-180">
                            expand_more
                        </span>
                    </button>

                    <div
                        class="absolute left-0 top-full w-72 bg-white rounded-xl shadow-lg border border-slate-200 py-2
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible
                            transition duration-200 z-20">

                        <a href="{{ route('layanan.baca') }}"
                        class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Layanan Baca di Tempat
                        </a>

                        <a href="{{ route('layanan.sirkulasi') }}"
                        class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Layanan Sirkulasi
                        </a>

                        <a href="{{ route('layanan.referensi') }}"
                        class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Layanan Referensi
                        </a>

                        <a href="{{ route('layanan.penelusuran') }}"
                        class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Layanan Penelusuran Informasi
                        </a>
                    </div>
                </div>


                {{-- LAYANAN REFERENSI (BARU) --}}
                <div class="relative group">
                    <button class="flex items-center gap-1
                        {{ request()->routeIs('referensi.*') ? 'font-semibold text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-amber-600' }}">
                        Layanan Referensi
                        <span class="material-symbols-outlined text-[18px] transition-transform group-hover:rotate-180">
                            expand_more
                        </span>
                    </button>

                    <div
                        class="absolute left-0 top-full w-72 bg-white rounded-xl shadow-lg border border-slate-200 py-2
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible
                            transition duration-200 z-20">

                        <a href="{{ route('referensi.meja') }}"
                        class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Layanan Meja Informasi
                        </a>

                        <a href="{{ route('referensi.konsultasi') }}"
                        class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Layanan Konsultasi
                        </a>

                        <a href="{{ route('referensi.kesiagaan') }}"
                        class="block px-4 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700">
                            Layanan Kesiagaan Informasi
                        </a>
                    </div>
                </div>


                {{-- PETA --}}
                <a href="{{ route('user.peta') }}"
                   class="{{ $isPeta
                        ? 'font-semibold text-amber-600 border-b-2 border-amber-600 pb-1'
                        : 'hover:text-amber-600' }}">
                    Peta
                </a>

            </nav>

            {{-- USER DROPDOWN --}}
            <div id="userDropdownWrapper" class="relative text-slate-700">
                <button id="userDropdownButton" class="flex items-center gap-2 cursor-pointer">
                    <div class="h-9 w-9 rounded-full bg-amber-400 flex items-center justify-center text-sm font-bold text-white">
                        {{ $user ? strtoupper(substr($user->name,0,1)) : 'U' }}
                    </div>

                    <div class="leading-tight hidden sm:flex flex-col text-left">
                        <span class="text-xs font-semibold text-slate-900">
                            {{ $user->name ?? 'User Perpustakaan' }}
                        </span>
                        <span class="text-[10px] text-slate-500">
                            SMPN 8 Bengkalis
                        </span>
                    </div>

                    <span id="userDropdownIcon"
                          class="material-symbols-outlined text-[18px] text-slate-500 transition">
                        expand_more
                    </span>
                </button>

                <div id="userDropdownMenu"
                     class="absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-lg border border-slate-200 py-2 hidden z-20">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="flex items-center gap-2 px-3 py-2 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700 w-full">
                            <span class="material-symbols-outlined text-[16px]">logout</span>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </header>

    {{-- TOAST LOGIN BERHASIL --}}
    @if(session('success'))
        <div
            id="toastSuccess"
            class="fixed top-4 right-4 z-50 flex items-center gap-2 px-4 py-3
                   bg-emerald-500 text-white text-xs rounded-xl shadow-lg
                   transform transition-all duration-300 ease-out">
            <span class="material-symbols-outlined text-[18px]">
                check_circle
            </span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- HERO --}}
    @yield('hero')

    {{-- KONTEN UTAMA --}}
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        @yield('content')
    </main>

    {{-- FOOTER BESAR PERPUSTAKAAN (MUNCUL DI SEMUA HALAMAN) --}}
    @include('partials.footer-perpus')

    {{-- SCRIPT DROPDOWN + TOAST --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('userDropdownWrapper');
        const button  = document.getElementById('userDropdownButton');
        const menu    = document.getElementById('userDropdownMenu');
        const icon    = document.getElementById('userDropdownIcon');

        // DROPDOWN USER
        if (wrapper && button && menu) {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                menu.classList.toggle('hidden');
                if (icon) {
                    icon.classList.toggle('rotate-180');
                }
            });

            document.addEventListener('click', function (e) {
                if (!menu.classList.contains('hidden') && !wrapper.contains(e.target)) {
                    menu.classList.add('hidden');
                    if (icon) {
                        icon.classList.remove('rotate-180');
                    }
                }
            });
        }

        // TOAST AUTO HIDE
        const toast = document.getElementById('toastSuccess');
        if (toast) {
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => {
                    if (toast && toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 300);
            }, 3000);
        }
    });
    </script>

</body>
</html>
