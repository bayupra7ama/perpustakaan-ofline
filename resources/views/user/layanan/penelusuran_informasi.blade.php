@extends('layouts.user')
@section('title','Layanan Penelusuran Informasi')

@section('hero')
@include('partials.hero', [
  'title' => 'Layanan Penelusuran Informasi',
  'breadcrumb' => 'Home / Layanan Perpustakaan / Penelusuran Informasi'
])
@endsection

@section('content')
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
  <p class="text-sm text-slate-700">Isi halaman layanan penelusuran informasi.</p>
</div>
@endsection
