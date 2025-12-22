<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Novel',
            'Cerpen',
            'Komik',
            'Pendidikan',
            'Teknologi',
            'Agama',
            'Sejarah',
            'Biografi',
            'Sains',
            'Bahasa',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                ['name' => $name], // cek berdasarkan nama
                [
                    'description' => 'Kategori buku ' . $name,
                ]
            );
        }
    }
}
