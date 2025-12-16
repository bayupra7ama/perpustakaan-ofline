@extends('layouts.user')
@section('title','Layanan Referensi')

@section('hero')
@include('partials.hero', [
  'title' => 'Layanan Referensi',
  'breadcrumb' => 'Home / Layanan Perpustakaan / Referensi'
])
@endsection

@section('content')
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
  <p class="text-sm text-slate-700">Isi halaman layanan referensi.</p>
</div>
@endsection
