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
                'name'     => 'Admin Perpustakaan',
                'password' => Hash::make('password123'), // ganti nanti
            ]
        );
    }
}

