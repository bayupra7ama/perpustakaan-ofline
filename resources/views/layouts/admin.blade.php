<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- FAVICON --}}
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/logo.png') }}">
    <title>@yield('title', 'Dashboard Admin • Perpustakaan SMPN 8 Bengkalis')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Icons --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300;400;600&display=swap" />
</head>

<body class="bg-slate-100 text-slate-900">

    {{-- ================= MOBILE SIDEBAR (DRAWER) ================= --}}
    <div id="mobileSidebar" class="fixed inset-0 z-50 hidden md:hidden">
        {{-- Backdrop --}}
        <div id="mobileSidebarBackdrop" class="absolute inset-0 bg-black/50"></div>

        {{-- Drawer --}}
        <aside class="absolute left-0 top-0 h-full w-64 bg-slate-900 text-slate-100 flex flex-col">

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-emerald-500 flex items-center justify-center font-bold">
                        PD
                    </div>
                    <div>
                        <h1 class="text-sm font-semibold leading-tight">
                            Perpustakaan Digital Offline
                        </h1>
                        <p class="text-xs text-slate-400">
                            SMPN 8 Bengkalis
                        </p>
                    </div>
                </div>

                <button id="sidebarClose" class="text-slate-400 hover:text-white">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 px-4 py-4 space-y-1 text-sm overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-500/10 text-emerald-300' : 'hover:bg-slate-800/80' }}">
                    <span class="material-symbols-outlined">space_dashboard</span>
                    Dashboard
                </a>

                <a href="{{ route('admin.buku.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('admin.buku.*') ? 'bg-emerald-500/10 text-emerald-300' : 'hover:bg-slate-800/80' }}">
                    <span class="material-symbols-outlined">menu_book</span>
                    Koleksi Buku
                </a>

                <a href="{{ route('admin.kategori.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('admin.kategori.*') ? 'bg-emerald-500/10 text-emerald-300' : 'hover:bg-slate-800/80' }}">
                    <span class="material-symbols-outlined">category</span>
                    Kategori
                </a>
            </nav>

            <div class="px-4 py-4 border-t border-slate-800 text-xs text-slate-400">
                <p>Offline via WLAN (WPA2 + AES)</p>
                <p>v1.0.0</p>
            </div>
        </aside>
    </div>

    {{-- ================= LAYOUT WRAPPER ================= --}}
    <div class="min-h-screen flex">

        {{-- ================= DESKTOP SIDEBAR ================= --}}
        <aside class="hidden md:flex md:flex-col w-64 bg-slate-900 text-slate-100">
            @php
                $activeClass = 'bg-emerald-500/10 text-emerald-300';
                $inactiveClass = 'hover:bg-slate-800/80 transition';
            @endphp

            <div class="px-6 py-5 border-b border-slate-800">
                <div class="flex items-center gap-3">
                    <div
                        class="h-10 w-10 rounded-xl bg-emerald-500 flex items-center justify-center text-white font-bold">
                        PD
                    </div>
                    <div>
                        <h1 class="text-sm font-semibold leading-tight">
                            Perpustakaan Digital Offline
                        </h1>
                        <p class="text-xs text-slate-400">
                            SMPN 8 Bengkalis
                        </p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-1 text-sm">
                <p class="px-3 text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">
                    Menu Utama
                </p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('admin.dashboard') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined">space_dashboard</span>
                    Dashboard
                </a>

                <a href="{{ route('admin.buku.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('admin.buku.*') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined">menu_book</span>
                    Koleksi Buku
                </a>

                <a href="{{ route('admin.kategori.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('admin.kategori.*') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined">category</span>
                    Kategori
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg
   {{ request()->routeIs('admin.users.*') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined">group</span>
                    Manajemen User
                </a>

            </nav>

            <div class="px-4 py-4 border-t border-slate-800 text-xs text-slate-400">
                <p>Offline via WLAN (WPA2 + AES)</p>
                <p>v1.0.0</p>
            </div>
        </aside>

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="flex-1 flex flex-col">

            {{-- TOP BAR --}}
            <header class="w-full bg-white border-b border-slate-200">
                <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-4">

                    <div class="flex items-center gap-3">
                        {{-- Hamburger --}}
                        <button id="sidebarToggle"
                            class="md:hidden inline-flex items-center justify-center p-2 rounded-lg
                                   text-slate-700 hover:bg-slate-100">
                            <span class="material-symbols-outlined text-[24px]">menu</span>
                        </button>

                        <div>
                            <h2 class="text-sm font-semibold text-slate-800">
                                @yield('page_title', 'Dashboard Admin')
                            </h2>
                            <p class="text-xs text-slate-500">
                                Ringkasan sistem perpustakaan digital offline
                            </p>
                        </div>
                    </div>

                    {{-- USER DROPDOWN --}}
                    <div id="userDropdownWrapper" class="relative">
                        <button id="userDropdownButton" class="flex items-center gap-2 focus:outline-none">

                            {{-- AVATAR --}}
                            <div
                                class="h-8 w-8 rounded-full bg-emerald-500 text-white
                   flex items-center justify-center text-xs font-bold">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </div>

                            {{-- INFO (DESKTOP) --}}
                            <div class="hidden sm:block text-xs text-left">
                                <p class="font-semibold text-slate-700">
                                    {{ auth()->user()->name ?? 'Admin Perpustakaan' }}
                                </p>
                                <p class="text-slate-500">
                                    {{ auth()->user()->email ?? 'admin@smpn8.sch.id' }}
                                </p>
                            </div>

                            {{-- ICON --}}
                            <span id="userDropdownIcon"
                                class="material-symbols-outlined text-[18px] text-slate-500 transition">
                                expand_more
                            </span>
                        </button>

                        {{-- DROPDOWN --}}
                        <div id="userDropdownMenu"
                            class="absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-lg
                border border-slate-200 py-2 hidden z-50">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="w-full flex items-center gap-2 px-3 py-2 text-xs
                       text-red-600 hover:bg-red-50">
                                    <span class="material-symbols-outlined text-[16px]">
                                        logout
                                    </span>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </header>

            {{-- CONTENT --}}
            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- ================= SCRIPT ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openBtn = document.getElementById('sidebarToggle');
            const closeBtn = document.getElementById('sidebarClose');
            const sidebar = document.getElementById('mobileSidebar');
            const backdrop = document.getElementById('mobileSidebarBackdrop');

            function openSidebar() {
                sidebar.classList.remove('hidden');
            }

            function closeSidebar() {
                sidebar.classList.add('hidden');
            }

            if (openBtn) openBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);
        });
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('userDropdownWrapper');
            const button = document.getElementById('userDropdownButton');
            const menu = document.getElementById('userDropdownMenu');
            const icon = document.getElementById('userDropdownIcon');

            if (!wrapper || !button || !menu) return;

            button.addEventListener('click', function(e) {
                e.stopPropagation();
                menu.classList.toggle('hidden');
                if (icon) icon.classList.toggle('rotate-180');
            });

            document.addEventListener('click', function(e) {
                if (!wrapper.contains(e.target)) {
                    menu.classList.add('hidden');
                    if (icon) icon.classList.remove('rotate-180');
                }
            });
        });
    </script>



</body>

</html>
