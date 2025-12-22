<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar • Perpustakaan Digital SMPN 8 Bengkalis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center">

    <div class="w-full max-w-md px-4">
        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-8">

            {{-- LOGO --}}
            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('img/logo.png') }}" class="h-16 mb-3">
                <h1 class="text-lg font-semibold text-slate-800">
                    Daftar Akun Perpustakaan
                </h1>
                <p class="text-xs text-slate-500">
                    SMPN 8 Bengkalis • Offline via WLAN
                </p>
            </div>

            {{-- ERROR --}}
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

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm
                           focus:ring-2 focus:ring-[#0098d9] focus:border-[#00499c] focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Email
                    </label>
                    <input type="email" name="email"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm
                           focus:ring-2 focus:ring-[#0098d9] focus:border-[#00499c] focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Password
                    </label>
                    <input type="password" name="password"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm
                           focus:ring-2 focus:ring-[#0098d9] focus:border-[#00499c] focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm
                           focus:ring-2 focus:ring-[#0098d9] focus:border-[#00499c] focus:outline-none">
                </div>

                <button type="submit" class="w-full py-2 rounded-lg text-sm font-semibold text-white transition"
                    style="background-color:#00499c" onmouseover="this.style.backgroundColor='#0098d9'"
                    onmouseout="this.style.backgroundColor='#00499c'">
                    Daftar
                </button>
            </form>

            <p class="mt-5 text-[11px] text-slate-500 text-center">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold hover:underline" style="color:#00499c">
                    Login di sini
                </a>
            </p>

        </div>
    </div>

</body>

</html>
