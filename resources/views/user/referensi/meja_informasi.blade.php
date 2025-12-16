@extends('layouts.user')

@section('title', 'Layanan Meja Informasi')

@section('hero')
    @include('partials.hero', [
        'breadcrumb' => 'Home / Layanan Referensi / Meja Informasi',
        'title' => 'Layanan Meja Informasi'
    ])
@endsection

@section('content')
<div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
    <p class="text-sm text-slate-600">Halaman layanan meja informasi.</p>
</div>
@endsection
