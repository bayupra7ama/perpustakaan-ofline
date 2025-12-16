<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - Perpustakaan Digital Offline')</title>

    {{-- KITA MATIKAN VITE DULU --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    {{-- PAKAI TAILWIND CDN DULU BIAR CEPAT --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- ICON GOOGLE --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300;400;600&display=swap" />
</head>
<body class="bg-slate-100 text-slate-900">

<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="hidden md:flex md:flex-col w-64 bg-slate-900 text-slate-100">
        <div class="px-6 py-5 border-b border-slate-800">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl bg-emerald-500 flex items-center justify-center text-white font-bold">
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

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg bg-emerald-500/10 text-emerald-300">
                <span class="material-symbols-outlined text-base">space_dashboard</span>
                <span>Dashboard</span>
            </a>

            {{-- Koleksi Buku --}}
            <a href="{{ route('admin.buku.index') }}"
              class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/80 transition">
                <span class="material-symbols-outlined text-base">menu_book</span>
                <span>Koleksi Buku</span>
            </a>


            {{-- Kategori: arahkan ke route admin.kategori.index --}}
            <a href="{{ route('admin.kategori.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/80 transition">
                <span class="material-symbols-outlined text-base">category</span>
                <span>Kategori</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/80 transition">
                <span class="material-symbols-outlined text-base">group</span>
                <span>Pengguna</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/80 transition">
                <span class="material-symbols-outlined text-base">download</span>
                <span>Log Unduhan</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/80 transition">
                <span class="material-symbols-outlined text-base">upload_file</span>
                <span>Referensi Guru</span>
            </a>

            <p class="px-3 mt-4 text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">
                Sistem
            </p>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/80 transition">
                <span class="material-symbols-outlined text-base">settings</span>
                <span>Pengaturan</span>
            </a>
        </nav>

        <div class="px-4 py-4 border-t border-slate-800 text-xs text-slate-400">
            <p>Offline via WLAN (WPA2 + AES)</p>
            <p>v1.0.0</p>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="flex-1 flex flex-col">

        {{-- TOP BAR --}}
        <header class="w-full bg-white border-b border-slate-200">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div>
                        <h2 class="text-sm font-semibold text-slate-800">
                            Dashboard Admin
                        </h2>
                        <p class="text-xs text-slate-500">
                            Ringkasan sistem perpustakaan digital offline
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex flex-col items-end text-xs">
                        <span class="text-slate-500">
                            {{ now()->translatedFormat('d F Y') }}
                        </span>
                        <span class="text-emerald-600 font-semibold">
                            Status: Offline (WLAN)
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="h-8 w-8 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold">
                            A
                        </div>
                        <div class="hidden sm:block text-xs">
                            <p class="font-semibold text-slate-700">Admin Perpustakaan</p>
                            <p class="text-slate-500">admin@smpn8.sch.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- AREA ISI HALAMAN (DINAMIS) --}}
        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
