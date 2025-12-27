@extends('layouts.admin')

@section('title', 'Tambah User • Perpustakaan SMPN 8 Bengkalis')
@section('page_title', 'Tambah User')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-6">
        <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white p-6 rounded-xl border space-y-4">
            @csrf

            <input name="name" placeholder="Nama" class="w-full border rounded-lg px-3 py-2 text-xs">

            <input name="email" placeholder="Email" class="w-full border rounded-lg px-3 py-2 text-xs">

            <input name="password" type="password" placeholder="Password"
                class="w-full border rounded-lg px-3 py-2 text-xs">

            <select name="role" class="w-full border rounded-lg px-3 py-2 text-xs">
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="user">Siswa</option>
            </select>

            <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-xs">
                Simpan
            </button>
        </form>
    </div>
@endsection
