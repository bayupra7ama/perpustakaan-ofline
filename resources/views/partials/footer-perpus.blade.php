<section class="mt-12 w-full bg-amber-500 text-white">
    {{-- isi dibatasi agar rapi tapi box kuning full kiri–kanan --}}
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <div class="grid gap-10 md:grid-cols-4">

            {{-- KOL 1: LOGO + DESKRIPSI --}}
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-3">
                    <div class="h-20 w-20 rounded-full bg-white/90 flex items-center justify-center shadow-md">
                        {{-- nanti ganti dengan <img> logo sekolah kalau sudah ada --}}
                        <span class="text-[11px] font-bold text-amber-600 text-center leading-tight">
                            LOGO<br>SEKOLAH
                        </span>
                    </div>
                </div>
                <div class="mt-2">
                    <p class="text-sm font-semibold">
                        Website Resmi Perpustakaan<br>SMPN 8 Bengkalis
                    </p>
                    <p class="text-xs mt-2 text-amber-50">
                        Perpustakaan digital offline yang dapat diakses melalui jaringan WLAN
                        di lingkungan sekolah.
                    </p>
                </div>
            </div>

            {{-- KOL 2: KONTAK KAMI --}}
            <div>
                <h3 class="text-lg font-semibold mb-3">
                    Kontak Kami
                </h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-[18px] mt-0.5">
                            call
                        </span>
                        <span>0812-3456-7890</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-[18px] mt-0.5">
                            mail
                        </span>
                        <span>smpn8bengkalis@gmail.com</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-[18px] mt-0.5">
                            location_on
                        </span>
                        <span>
                            Jl. PELAJAR KELEMANTAN, KELEMANTAN, Kec. Bengkalis, Kab. Bengkalis<br>
                            Riau, Indonesia
                        </span>
                    </li>
                </ul>
            </div>

            {{-- KOL 3: TENTANG KAMI --}}
            <div>
                <h3 class="text-lg font-semibold mb-3">
                    Tentang Kami
                </h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('tentang.sejarah') }}" class="hover:underline">
                            Sejarah
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tentang.visimisi') }}" class="hover:underline">
                            Visi &amp; Misi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tentang.struktur') }}" class="hover:underline">
                            Struktur Organisasi
                        </a>
                    </li>
                </ul>
            </div>

            {{-- KOL 4: LINKS --}}
            <div>
                <h3 class="text-lg font-semibold mb-3">
                    Links
                </h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <span class="block">
                            Website SMPN 8 Bengkalis
                        </span>
                    </li>
                    <li>
                        <span class="block">
                            Informasi Siswa &amp; Alumni
                        </span>
                    </li>
                    <li>
                        <span class="block">
                            Perpustakaan Digital Offline
                        </span>
                    </li>
                </ul>
            </div>

        </div>

        {{-- GARIS & COPYRIGHT (TENGAH) --}}
        <div class="mt-8">
            <div class="h-px w-full bg-amber-200/70 mb-3"></div>

            <p class="text-[11px] text-amber-50 text-center">
                Copyright © {{ date('Y') }}
                <span class="font-semibold">SMPN 8 Bengkalis</span>. All Rights Reserved.
            </p>
        </div>

    </div>
</section>
