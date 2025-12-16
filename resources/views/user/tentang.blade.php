{{-- resources/views/user/tentang.blade.php --}}
@extends('layouts.user')

@section('title', 'Tentang Perpustakaan - SMPN 8 Bengkalis')

{{-- HERO ORANYE DI ATAS --}}
@section('hero')
    <section class="bg-amber-500 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <p class="text-xs sm:text-sm opacity-80 mb-2">
                Home / <span class="font-semibold">Tentang Perpustakaan</span>
            </p>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-semibold tracking-tight">
                Tentang Perpustakaan Sekolah
            </h1>
            <div class="mt-2 h-1 w-20 bg-white/80 rounded-full"></div>
        </div>
    </section>
@endsection

@section('content')

    {{-- SECTION: PENDAHULUAN + KARTU FOTO PERPUSTAKAAN --}}
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

        {{-- KOLOM KIRI: TEKS PENDAHULUAN --}}
        <div>
            <h2 class="text-xl sm:text-2xl font-semibold text-slate-800 mb-4">
                PENDAHULUAN
            </h2>

            <div class="space-y-4 text-sm sm:text-base leading-relaxed text-slate-700">
                <p>
                    Perpustakaan SMP Negeri 8 Bengkalis merupakan salah satu pusat sumber belajar
                    yang memfasilitasi kebutuhan informasi peserta didik dan pendidik. Keberadaan
                    perpustakaan menjadi bagian penting dalam mendukung proses pembelajaran
                    serta pencapaian hasil belajar yang optimal di sekolah.
                </p>

                <p>
                    Melalui koleksi buku cetak, bahan digital, serta referensi pembelajaran lainnya,
                    perpustakaan membantu warga sekolah untuk memperluas wawasan, menumbuhkan
                    budaya literasi, dan membiasakan sikap gemar membaca sejak dini. Lingkungan
                    perpustakaan dirancang agar nyaman, tenang, dan kondusif untuk kegiatan belajar
                    mandiri maupun diskusi kelompok.
                </p>

                <p>
                    Selain itu, perpustakaan juga berperan sebagai pendukung pelaksanaan kurikulum,
                    penyedia bahan pustaka untuk tugas-tugas sekolah, serta media pengembangan
                    minat dan bakat siswa. Dengan dukungan teknologi dan jaringan WLAN offline,
                    perpustakaan digital ini diharapkan dapat menghadirkan layanan informasi yang
                    lebih mudah diakses kapan saja selama berada di lingkungan sekolah.
                </p>
            </div>
        </div>

        {{-- KOLOM KANAN: KARTU FOTO + INFO PERPUSTAKAAN --}}
        <div class="bg-white rounded-3xl shadow-md border border-slate-100 overflow-hidden">

            {{-- BAGIAN FOTO ATAS --}}
            <div class="border-b border-slate-100">
                <div class="grid grid-cols-2 gap-1 p-3 bg-slate-50">
                    {{-- Foto besar kiri --}}
                    <div class="col-span-2">
                        <div class="aspect-[16/9] rounded-2xl overflow-hidden bg-slate-200 flex items-center justify-center text-[11px] text-slate-500">
                            {{-- Ganti dengan <img src="{{ asset('images/perpus-utama.jpg') }}" class="w-full h-full object-cover"> --}}
                            Foto Utama Perpustakaan
                        </div>
                    </div>

                    {{-- Foto kecil-kecil di bawah --}}
                    <div class="grid grid-cols-3 gap-2 col-span-2 mt-2">
                        <div class="aspect-square rounded-xl overflow-hidden bg-slate-200 flex items-center justify-center text-[10px] text-slate-500">
                            Ruang Baca
                        </div>
                        <div class="aspect-square rounded-xl overflow-hidden bg-slate-200 flex items-center justify-center text-[10px] text-slate-500">
                            Rak Koleksi
                        </div>
                        <div class="aspect-square rounded-xl overflow-hidden bg-slate-200 flex items-center justify-center text-[10px] text-slate-500">
                            Sudut Literasi
                        </div>
                    </div>
                </div>
            </div>

            {{-- BAGIAN VISI MISI + INFO SINGKAT --}}
            <div class="p-4 sm:p-5 space-y-4">

                {{-- Visi Misi --}}
                <div>
                    <h3 class="text-xs font-semibold text-slate-600 tracking-wide mb-1">
                        VISI MISI PERPUSTAKAAN
                    </h3>
                    <div class="h-0.5 w-10 bg-amber-500 rounded-full mb-2"></div>

                    <p class="text-[11px] text-slate-600 mb-2">
                        <span class="font-semibold">Visi:</span> Mewujudkan generasi yang berkarakter,
                        cerdas, dan berwawasan luas melalui budaya literasi dan pemanfaatan sumber
                        informasi yang berkualitas.
                    </p>

                    <ul class="text-[11px] text-slate-600 list-decimal list-inside space-y-1">
                        <li>Menumbuhkan kebiasaan membaca di kalangan warga sekolah.</li>
                        <li>Menyediakan koleksi yang relevan dengan kebutuhan kurikulum.</li>
                        <li>Mendukung pembelajaran berbasis teknologi melalui perpustakaan digital.</li>
                        <li>Menciptakan lingkungan perpustakaan yang bersih, rapi, dan nyaman.</li>
                    </ul>
                </div>

                {{-- Panel Info Singkat --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-[11px] text-slate-600">
                    <div class="bg-slate-50 rounded-2xl p-3 border border-slate-100">
                        <p class="font-semibold text-slate-800 mb-1">
                            Layanan
                        </p>
                        <ul class="space-y-1">
                            <li>• Layanan sirkulasi & peminjaman buku</li>
                            <li>• Layanan referensi belajar</li>
                            <li>• Akses koleksi digital offline</li>
                            <li>• Ruang baca individu & kelompok</li>
                        </ul>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-3 border border-slate-100">
                        <p class="font-semibold text-slate-800 mb-1">
                            Fasilitas
                        </p>
                        <ul class="space-y-1">
                            <li>• Ruangan ber-AC yang nyaman</li>
                            <li>• Jaringan WLAN khusus perpustakaan</li>
                            <li>• Komputer akses koleksi digital</li>
                            <li>• Area display karya & jurnal siswa</li>
                        </ul>
                    </div>
                </div>

                {{-- Info Teknis Singkat --}}
                <div class="bg-amber-50 rounded-2xl p-3 border border-amber-100 text-[11px] text-amber-900">
                    <p class="font-semibold mb-1">
                        Informasi Singkat
                    </p>
                    <p>Jam layanan perpustakaan mengikuti jadwal kegiatan belajar mengajar di SMPN 8 Bengkalis.
                        Akses perpustakaan digital hanya dapat digunakan ketika perangkat terhubung ke jaringan
                        Wi-Fi sekolah yang telah disediakan.</p>
                </div>

            </div>
        </div>
    </section>

@endsection
