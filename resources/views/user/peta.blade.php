@extends('layouts.user')

@section('title', 'Peta Lokasi - Perpustakaan SMPN 8 Bengkalis')

@section('hero')
@include('partials.hero', [
    'title' => 'Peta Lokasi SMPN 8 Bengkalis',
    'breadcrumb' => 'Home / Peta Lokasi'
])
@endsection

@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h2 class="text-base md:text-lg font-semibold text-slate-900 mb-4">
            Lokasi Perpustakaan SMPN 8 Bengkalis
        </h2>

        <div class="flex flex-col md:flex-row md:items-start gap-6">
            {{-- INFO ALAMAT --}}
            <div class="md:w-1/3 space-y-2 text-sm text-slate-700">
                <p class="font-semibold">
                    Perpustakaan SMPN 8 Bengkalis
                </p>
                <p>
                    Jl. Pelajar Kelemantan, Kel. Kelemantan<br>
                    Kec. Bengkalis, Kab. Bengkalis<br>
                    Riau, Indonesia
                </p>
                <p class="text-xs text-slate-500">
                    Peta ini membutuhkan koneksi internet.
                    Akses perpustakaan digital tetap dapat digunakan
                    melalui Wi-Fi sekolah.
                </p>
            </div>

            {{-- MAP --}}
            <div class="md:flex-1 h-64 md:h-80 rounded-xl overflow-hidden border border-slate-200">
                <iframe
                    src="https://www.google.com/maps?q=SMPN+8+Bengkalis&output=embed"
                    class="w-full h-full border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection
