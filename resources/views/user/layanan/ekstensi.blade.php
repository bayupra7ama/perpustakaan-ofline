@extends('layouts.user')
@section('title','Layanan Ekstensi')

@section('hero')
@include('partials.hero', [
  'title' => 'Layanan Ekstensi',
  'breadcrumb' => 'Home / Layanan Perpustakaan / Ekstensi'
])
@endsection

@section('content')
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
  <p class="text-sm text-slate-700">Isi halaman layanan ekstensi.</p>
</div>
@endsection
