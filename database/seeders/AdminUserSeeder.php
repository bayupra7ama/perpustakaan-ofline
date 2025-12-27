<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@smpn8.sch.id'],
            [
                'name' => 'Admin Perpustakaan',
                'password' => Hash::make('admin123'), // password: admin123
                'role' => 'admin',
            ]
        );

        // User biasa
        User::updateOrCreate(
            ['email' => 'siswa@smpn8.sch.id'],
            [
                'name' => 'Siswa Perpustakaan',
                'password' => Hash::make('siswa123'), // password: siswa123
                'role' => 'user',
            ]
        );
        User::updateOrCreate(
            ['email' => 'guru@smpn8.sch.id'],
            [
                'name' => 'Guru Sekolah',
                'password' => Hash::make('guru123'), // password: siswa123
                'role' => 'guru',
            ]
        );
    }
}

