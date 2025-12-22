<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ==========================
    // FORM LOGIN
    // ==========================
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        // validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            session()->flash('success', 'Login berhasil! Selamat datang, ' . $user->name . '.');

            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                // 'guru' => redirect()->route('guru.dashboard'),
                default => redirect()->route('user.dashboard'),
            };
        }


        // kalau gagal login
        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->onlyInput('email');
    }


    // ==========================
    // FORM REGISTER
    // ==========================
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Buat user baru dengan role "user"
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',   // pastikan kolom role sudah ada di tabel users
        ]);

        // ❌ TIDAK lagi auto-login
        // Auth::login($user);

        // ✅ Setelah daftar, kembali ke halaman login
        return redirect()
            ->route('login')
            ->with('success', 'Pendaftaran berhasil! Silakan login dengan akun yang baru dibuat.');
    }

    // ==========================
    // LOGOUT
    // ==========================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
