@extends('layouts.user')
@section('title','Layanan Sirkulasi')

@section('hero')
@include('partials.hero', [
  'title' => 'Layanan Sirkulasi',
  'breadcrumb' => 'Home / Layanan Perpustakaan / Sirkulasi'
])
@endsection

@section('content')
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
  <p class="text-sm text-slate-700">Isi halaman layanan sirkulasi.</p>
</div>
@endsection
