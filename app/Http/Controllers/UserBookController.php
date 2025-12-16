<?php

namespace App\Http\Controllers;

use App\Models\Book; // pastikan model Book ada di sini

class UserBookController extends Controller
{
    // ------------------------------
    // BUKU KELAS 7 / 8 / 9
    // ------------------------------
    public function byKelas($kelas)
    {
        // SESUAIKAN nama kolom di tabel:
        // misal kolomnya 'kelas', isinya 7 / 8 / 9
        $books = Book::where('kelas', $kelas)
            ->orderBy('judul')   // kalau kolom judul = 'judul'
            ->get();

        return view('user.buku.kelas', [
            'kelas' => $kelas,
            'books' => $books,
        ]);
    }

    // ------------------------------
    // PANDUAN GURU
    // ------------------------------
        public function panduanGuru()
    {
        // SEMENTARA: ambil semua buku dulu
        // Nanti kalau sudah ada kolom kategori/tipe untuk panduan guru,
        // tinggal ganti query ini pakai where()
        
        $books = Book::orderBy('judul')->get();

        return view('user.buku.panduan_guru', [
            'books' => $books,
        ]);
    }

}
