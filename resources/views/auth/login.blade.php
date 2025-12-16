<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
        <h1 class="text-lg font-semibold text-slate-900 mb-1">
            Login Perpustakaan Digital
        </h1>
        <p class="text-xs text-slate-500 mb-4">
            SMPN 8 Bengkalis • Offline via WLAN
        </p>

        {{-- NOTIFIKASI SUKSES (setelah register) --}}
        @if(session('success'))
            <div class="mb-3 text-xs text-green-700 bg-green-50 border border-green-200 rounded-lg px-3 py-2">
                {{ session('success') }}
            </div>
        @endif

        {{-- PESAN ERROR LOGIN --}}
        @if($errors->any())
            <div class="mb-3 text-xs text-red-700 bg-red-50 border border-red-200 rounded-lg px-3 py-2">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- FORM LOGIN --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-xs font-medium text-slate-700 mb-1">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-amber-500"
                >
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-xs font-medium text-slate-700 mb-1">
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-amber-500"
                >
            </div>

            {{-- Tombol Login --}}
            <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg py-2 text-sm">
                Masuk
            </button>
        </form>

        {{-- LINK KE PENDAFTARAN --}}
        <p class="mt-4 text-[11px] text-slate-500 text-center">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-amber-600 font-semibold hover:underline">
                Daftar dulu
            </a>
        </p>
    </div>

</body>
</html>
