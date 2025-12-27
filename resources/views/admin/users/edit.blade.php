@extends('layouts.admin')

@section('title', 'Edit User • Perpustakaan SMPN 8 Bengkalis')
@section('page_title', 'Edit User')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-6">

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 text-xs rounded-lg px-3 py-2">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}"
            class="bg-white p-6 rounded-xl border space-y-4">
            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <input name="name" value="{{ old('name', $user->name) }}" placeholder="Nama"
                class="w-full border rounded-lg px-3 py-2 text-xs">

            {{-- EMAIL --}}
            <input name="email" value="{{ old('email', $user->email) }}" placeholder="Email"
                class="w-full border rounded-lg px-3 py-2 text-xs">

            {{-- ROLE --}}
            <select name="role" class="w-full border rounded-lg px-3 py-2 text-xs">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Siswa</option>
            </select>

            {{-- INFO --}}
            <p class="text-[11px] text-slate-500">
                Password tidak dapat diubah oleh admin.
            </p>

            {{-- BUTTON --}}
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-xs">
                    Update
                </button>

                <a href="{{ route('admin.users.index') }}" class="text-xs text-slate-500 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
