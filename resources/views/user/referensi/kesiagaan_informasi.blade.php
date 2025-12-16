@extends('layouts.user')

@section('title', 'Layanan Kesiagaan Informasi')

@section('hero')
    @include('partials.hero', [
        'breadcrumb' => 'Home / Layanan Referensi / Kesiagaan Informasi',
        'title' => 'Layanan Kesiagaan Informasi'
    ])
@endsection

@section('content')
<div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
    <p class="text-sm text-slate-600">Halaman layanan kesiagaan informasi.</p>
</div>
@endsection
