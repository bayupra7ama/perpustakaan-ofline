<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Perpustakaan Digital</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md mx-auto">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-xl font-semibold text-slate-900 mb-1">
                Daftar Akun Perpustakaan
            </h1>
            <p class="text-xs text-slate-500 mb-4">
                SMPN 8 Bengkalis • Offline via WLAN
            </p>

            {{-- TAMPILKAN ERROR --}}
            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 px-3 py-2 text-xs text-red-700">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST" class="space-y-3">
                @csrf

                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200
                                  focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                           placeholder="Contoh: Siswa Perpustakaan">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200
                                  focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                           placeholder="contoh@smpn8bengkalis.sch.id">
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Password
                    </label>
                    <input type="password" name="password"
                           class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200
                                  focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation"
                           class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200
                                  focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                </div>

                <button type="submit"
                        class="w-full mt-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold py-2 rounded-lg transition">
                    Daftar
                </button>
            </form>

            <p class="mt-4 text-[11px] text-slate-500 text-center">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-amber-600 font-semibold hover:underline">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>

</body>
</html>
