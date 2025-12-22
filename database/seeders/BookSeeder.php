<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // ambil semua kategori
        $categories = Category::pluck('id')->toArray();

        if (count($categories) === 0) {
            $this->command->warn('Kategori kosong, jalankan CategorySeeder dulu');
            return;
        }

        // cover yang SUDAH ADA
        $coverPath = 'books/covers/GQ6RKSZi7AeWQKghyLBZt5ZzQt7PooG3lCzCTLgP.jpg';

        // contoh judul
        $judulBuku = [
            'Matematika Dasar',
            'Bahasa Indonesia',
            'IPA Terpadu',
            'IPS Sejarah',
            'Biologi Modern',
            'Fisika Dasar',
            'Kimia Organik',
            'Teknologi Informasi',
            'Pendidikan Pancasila',
            'Agama Islam',
            'Novel Remaja',
            'Cerpen Nusantara',
            'Komik Edukasi',
        ];

        // bikin 50 buku
        for ($i = 1; $i <= 50; $i++) {

            $book = Book::create([
                'judul' => $judulBuku[array_rand($judulBuku)] . " Vol {$i}",
                'penulis' => 'Penulis ' . chr(64 + ($i % 26 ?: 1)),
                'penerbit' => 'Penerbit Nasional',
                'tahun_terbit' => rand(2018, 2024),
                'kelas' => collect(['7', '8', '9', 'umum'])->random(),
                'file_path' => "null", // biar kelihatan kondisi "belum ada file"
                'cover_path' => $coverPath,
                'hit_count' => rand(0, 200),
                'jumlah_akses' => rand(0, 300),
                'jumlah_unduh' => rand(0, 150),
                'is_active' => true,
            ]);

            // attach 1–3 kategori acak
            $book->categories()->attach(
                collect($categories)->random(rand(1, 3))->toArray()
            );
        }

        $this->command->info('Seeder buku berhasil (50 data)');
    }
}
