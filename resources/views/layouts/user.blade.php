<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- FAVICON --}}
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/logo.png') }}">
    <meta name="theme-color" content="#00499c">

    <title>@yield('title', 'Perpustakaan SMPN 8 Bengkalis')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('img/logo.png') }}">

    {{-- Google Icons --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300;400;600&display=swap" />
</head>

<body class="bg-slate-100 text-slate-900 antialiased">
    <div id="page-loader" class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>

    {{-- ================= TOP BAR ================= --}}
    <div class="text-white text-[11px]" style="background-color:#00499c">
        <div class="max-w-6xl mx-auto px-4 py-2 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">call</span>
                    0812-3456-7890
                </span>
                <span class="hidden sm:inline-block w-px h-3 bg-amber-200"></span>
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">mail</span>
                    smpn8bengkalis@gmail.com
                </span>
            </div>
        </div>
    </div>

    {{-- ================= NAVBAR ================= --}}
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

            {{-- LOGO --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('user.dashboard') }}">
                    <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center shadow ring-1"
                        style="ring-color:#0098d9">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo SMPN 8 Bengkalis"
                            class="h-8 w-8 object-contain">
                    </div>
                </a>

                <div class="leading-tight">
                    <p class="text-sm font-semibold text-slate-900">
                        PERPUSTAKAAN SMPN 8 BENGKALIS
                    </p>
                    <p class="text-[11px] text-slate-500">
                        SMP NEGERI 8 BENGKALIS
                    </p>
                </div>
            </div>

            {{-- MOBILE BUTTON --}}
            <button id="mobileMenuButton"
                class="md:hidden inline-flex items-center justify-center p-2 rounded-lg
                       text-slate-700 hover:bg-slate-100">
                <span class="material-symbols-outlined text-[26px]">menu</span>
            </button>

            {{-- DESKTOP MENU --}}
            <nav class="hidden md:flex items-center gap-6 text-sm text-slate-700">

                {{-- BERANDA --}}
                <a href="{{ route('user.dashboard') }}"
                    class="{{ request()->routeIs('user.dashboard')
                        ? 'font-semibold text-[#00499c] border-b-2 border-[#00499c] pb-1'
                        : 'hover:text-[#0098d9]' }}">
                    Beranda
                </a>

                {{-- BUKU --}}
                <a href="{{ route('user.buku.index') }}"
                    class="{{ request()->routeIs('user.buku.index') && !request()->has('categories')
                        ? 'font-semibold text-[#00499c] border-b-2 border-[#00499c] pb-1'
                        : 'hover:text-[#0098d9]' }}">
                    Buku
                </a>


                {{-- @php
                    $isPanduan =
                        request()->routeIs('user.buku.index') &&
                        collect(request()->input('categories', []))->contains($panduanId ?? -1);
                @endphp

                <a href="{{ route('user.buku.index', ['categories' => [$panduanId]]) }}"
                    class="{{ $isPanduan ? 'font-semibold text-[#00499c] border-b-2 border-[#00499c] pb-1' : 'hover:text-[#0098d9]' }}">
                    Panduan Guru
                </a> --}}



                {{-- TENTANG KAMI --}}
                <div class="relative group">
                    <button
                        class="flex items-center gap-1
                        {{ request()->routeIs('tentang.*')
                            ? 'font-semibold text-[#00499c] border-b-2 border-[#00499c] pb-1'
                            : 'hover:text-[#0098d9]' }}     ">
                        Tentang Kami
                        <span
                            class="material-symbols-outlined text-[18px]
                                     transition-transform group-hover:rotate-180">
                            expand_more
                        </span>
                    </button>

                    {{-- DROPDOWN --}}
                    <div
                        class="absolute left-0 top-full w-56 bg-white rounded-xl shadow-lg
                               border border-slate-200 py-2 opacity-0 invisible
                               group-hover:opacity-100 group-hover:visible transition z-20">

                        <a href="{{ route('tentang.struktur') }}"
                            class="block px-4 py-2 text-xs hover:bg-blue-50 hover:text-[#00499c]
">
                            Struktur Organisasi
                        </a>

                        <a href="{{ route('tentang.sejarah') }}"
                            class="block px-4 py-2 text-xs  hover:bg-blue-50 hover:text-[#00499c]">
                            Sejarah Sekolah
                        </a>

                        <a href="{{ route('tentang.visimisi') }}"
                            class="block px-4 py-2 text-xs  hover:bg-blue-50 hover:text-[#00499c]">
                            Visi dan Misi
                        </a>
                    </div>
                </div>
            </nav>

            {{-- LOGOUT --}}
            <div class="hidden md:block">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-2 text-sm text-[#00499c] hover:text-[#0098d9] transition">
                        <span class="material-symbols-outlined text-[#0098d9]">
                            logout
                        </span>
                        Keluar
                    </button>

                </form>
            </div>

        </div>
    </header>
    {{-- ================= HERO ================= --}}
    @yield('hero')


    {{-- ================= MOBILE MENU ================= --}}
    <div id="mobileMenu" class="md:hidden hidden bg-white border-b border-slate-200 shadow-sm">
        <nav class="px-4 py-3 space-y-2 text-sm">

            <a href="{{ route('user.dashboard') }}"
                class="block px-3 py-2 rounded-lg
                {{ request()->routeIs('user.dashboard')
                    ? 'bg-blue-50 text-[#00499c]
                                                                                                                                                                                                                                                                                                                 font-semibold'
                    : 'hover:bg-slate-100' }}">
                Beranda
            </a>
            <a href="{{ route('user.buku.index') }}"
                class="block px-3 py-2 rounded-lg
                {{ request()->routeIs('user.buku.index')
                    ? 'bg-blue-50 text-[#00499c]
                                                                                                                                                                                                                                                                                                 font-semibold'
                    : 'hover:bg-slate-100' }}">
                Buku
            </a>


            <a href="{{ route('user.panduan.index') }}"
                class="block px-3 py-2 rounded-lg
                {{ request()->routeIs('user.panduan.*')
                    ? 'bg-blue-50 text-[#00499c]
                                                                                                                                                                                                                                                                                                 font-semibold'
                    : 'hover:bg-slate-100' }}">
                Panduan Guru
            </a>

            <div class="pt-2">
                <p class="px-3 text-xs font-semibold text-slate-500 uppercase mb-1">
                    Tentang Kami
                </p>

                <a href="{{ route('tentang.struktur') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                    Struktur Organisasi
                </a>
                <a href="{{ route('tentang.sejarah') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                    Sejarah Sekolah
                </a>
                <a href="{{ route('tentang.visimisi') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                    Visi dan Misi
                </a>
            </div>

            <hr>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="w-full flex items-center gap-2 px-3 py-2 rounded-lg
                               text-red-600 hover:bg-red-50">
                    <span class="material-symbols-outlined text-[#0098d9]">
                        logout</span>
                    Keluar
                </button>
            </form>
        </nav>
    </div>

    {{-- ================= CONTENT ================= --}}
    <main class="max-w-7xl mx-auto px-4 py-6">
        @yield('content')
    </main>

    {{-- ================= FOOTER ================= --}}
    @include('partials.footer-perpus')

    {{-- ================= SCRIPT ================= --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobileMenuButton');
            const menu = document.getElementById('mobileMenu');

            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script> --}}

    <script src="{{ asset('js/main.js') }}"></script>

</body>



</html>
