@extends('layouts.admin')

@section('title', 'Manajemen User • Perpustakaan SMPN 8 Bengkalis')
@section('page_title', 'Manajemen User')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6 space-y-4">

        @if (session('success'))
            <div class="text-xs bg-emerald-50 border border-emerald-200 text-emerald-700 px-3 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between gap-3">
            <form method="GET" class="md:w-1/3">
                <input name="q" value="{{ $q }}" class="w-full border rounded-lg px-3 py-2 text-xs"
                    placeholder="Cari nama / email">
            </form>

            <a href="{{ route('admin.users.create') }}" class="px-3 py-2 text-xs bg-emerald-600 text-white rounded-lg">
                + Tambah User
            </a>
        </div>

        <div class="bg-white rounded-xl border overflow-x-auto">
            <table class="min-w-full text-xs">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-t">
                            <td class="px-4 py-2 font-semibold">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                            <td class="px-4 py-2 text-right space-x-1">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="px-2 py-1 border rounded text-[11px]">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Hapus user ini?')">
                                    @csrf @method('DELETE')
                                    <button class="px-2 py-1 border border-red-200 text-red-600 rounded text-[11px]">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
