@extends('layouts.user')
@section('title','Layanan Baca di Tempat')

@section('hero')
@include('partials.hero', [
  'title' => 'Layanan Baca di Tempat',
  'breadcrumb' => 'Home / Layanan Perpustakaan / Baca di Tempat'
])
@endsection

@section('content')
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
  <p class="text-sm text-slate-700">Isi halaman layanan baca di tempat.</p>
</div>
@endsection
