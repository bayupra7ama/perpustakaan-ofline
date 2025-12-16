@extends('layouts.user')

@section('title', 'Layanan Konsultasi')

@section('hero')
    @include('partials.hero', [
        'breadcrumb' => 'Home / Layanan Referensi / Konsultasi',
        'title' => 'Layanan Konsultasi'
    ])
@endsection

@section('content')
<div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
    <p class="text-sm text-slate-600">Halaman layanan konsultasi.</p>
</div>
@endsection
