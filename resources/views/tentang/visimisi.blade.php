@extends('layouts.user')

@section('title', 'Visi & Misi Perpustakaan')

@section('hero')
    @include('partials.hero', [
        'title' => 'Visi & Misi Perpustakaan',
        'breadcrumb' => 'Home / Tentang Kami / Visi & Misi',
    ])
@endsection

@section('content')
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

        {{-- ================= KOLOM KIRI ================= --}}
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

        {{-- ================= KOLOM KANAN ================= --}}
        <div class="bg-white rounded-3xl shadow-md border border-slate-100 overflow-hidden">

            {{-- ===== FOTO ===== --}}
            <div class="border-b border-slate-100">
                <div class="grid grid-cols-2 gap-1 p-3 bg-slate-50">

                    {{-- FOTO UTAMA --}}
                    <div class="col-span-2">
                        <div
                            class="aspect-[16/9] rounded-2xl overflow-hidden
                        bg-blue-50 border border-blue-100">
                            <img src="{{ asset('img/utama.jpg') }}" alt="Perpustakaan SMPN 8 Bengkalis"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- FOTO KECIL --}}
                    <div class="grid grid-cols-3 gap-2 col-span-2 mt-2">

                        {{-- Ruang Baca --}}
                        <div
                            class="aspect-square rounded-xl overflow-hidden
                        bg-blue-50 border border-blue-100">
                            <img src="{{ asset('img/ruaang_baca.jpeg') }}" alt="Ruang Baca"
                                class="w-full h-full object-cover">
                        </div>

                        {{-- Rak Koleksi --}}
                        <div
                            class="aspect-square rounded-xl overflow-hidden
                        bg-blue-50 border border-blue-100">
                            <img src="{{ asset('img/rak_koleksi.jpeg') }}" alt="Rak Koleksi Buku"
                                class="w-full h-full object-cover">
                        </div>

                        {{-- Sudut Literasi --}}
                        <div
                            class="aspect-square rounded-xl overflow-hidden
                        bg-blue-50 border border-blue-100">
                            <img src="{{ asset('img/sudut_literasi.jpeg') }}" alt="Sudut Literasi"
                                class="w-full h-full object-cover">
                        </div>

                    </div>

                </div>
            </div>


            {{-- ===== VISI MISI ===== --}}
            <div class="p-4 sm:p-5 space-y-4">

                <div>
                    <h3 class="text-xs font-semibold tracking-wide mb-1" style="color:#00499c">
                        VISI MISI PERPUSTAKAAN
                    </h3>
                    <div class="h-0.5 w-10 rounded-full mb-2" style="background-color:#0098d9"></div>

                    <p class="text-[11px] text-slate-600 mb-2">
                        <span class="font-semibold" style="color:#00499c">Visi:</span>
                        Mewujudkan generasi berkarakter dan berwawasan luas melalui budaya literasi.
                    </p>

                    <ul class="text-[11px] text-slate-600 list-decimal list-inside space-y-1">
                        <li>Menumbuhkan kebiasaan membaca.</li>
                        <li>Menyediakan koleksi sesuai kurikulum.</li>
                        <li>Mendukung pembelajaran berbasis teknologi.</li>
                        <li>Menciptakan perpustakaan yang nyaman.</li>
                    </ul>
                </div>

                {{-- ===== PANEL INFO ===== --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-[11px] text-slate-600">

                    <div class="bg-blue-50 rounded-2xl p-3 border border-blue-100">
                        <p class="font-semibold mb-1" style="color:#00499c">Layanan</p>
                        <ul class="space-y-1">
                            <li>• Peminjaman buku</li>
                            <li>• Referensi belajar</li>
                            <li>• Koleksi digital</li>
                        </ul>
                    </div>

                    <div class="bg-blue-50 rounded-2xl p-3 border border-blue-100">
                        <p class="font-semibold mb-1" style="color:#00499c">Fasilitas</p>
                        <ul class="space-y-1">
                            <li>• Ruang ber-AC</li>
                            <li>• WLAN sekolah</li>
                            <li>• Komputer digital</li>
                        </ul>
                    </div>
                </div>

                {{-- ===== INFORMASI TEKNIS ===== --}}
                <div class="bg-blue-50 rounded-2xl p-3 border border-blue-100 text-[11px] text-slate-700">
                    <p class="font-semibold mb-1" style="color:#00499c">
                        Informasi Singkat
                    </p>
                    <p>
                        Layanan mengikuti jam belajar sekolah.
                        Akses digital tersedia melalui Wi-Fi sekolah.
                    </p>
                </div>


            </div>
        </div>

    </section>
@endsection
