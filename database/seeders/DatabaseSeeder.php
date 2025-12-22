<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Admin
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
    }
}
