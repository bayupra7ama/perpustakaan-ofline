<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $books = Book::with('categories')
            ->whereHas('categories', function ($q) {
                $q->where('name', 'Panduan Guru');
            })
            ->orderBy('judul')
            ->get();

        return view('user.buku.panduan_guru', [
            'books' => $books,
        ]);
    }

    public function show(Book $book)
    {
        $book->load('categories');

        // HITUNG AKSES
        $book->increment('jumlah_akses');

        return view('user.buku.show', compact('book'));
    }

    public function index(Request $request)
    {
        $q = $request->q;
        $kelas = $request->kelas;

        // 🔥 FIX UTAMA
        $categories = (array) $request->input('categories', []);
        $panduanId = Category::where('name', 'Panduan Guru')->value('id');

        $books = Book::with('categories')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($q2) use ($q) {
                    $q2->where('judul', 'like', "%{$q}%")
                        ->orWhere('penulis', 'like', "%{$q}%");
                });
            })
            ->when($kelas, fn($query) => $query->where('kelas', $kelas))

            // 🟢 1 kategori → OR
            ->when(count($categories) === 1, function ($query) use ($categories) {
                $query->whereHas(
                    'categories',
                    fn($q) =>
                    $q->where('categories.id', $categories[0])
                );
            })

            // 🔵 >1 kategori → AND
            ->when(count($categories) > 1, function ($query) use ($categories) {
                $query->whereHas(
                    'categories',
                    fn($q) => $q->whereIn('categories.id', $categories),
                    '=',
                    count($categories)
                );
            })

            ->latest()
            ->paginate(20)
            ->withQueryString();

        $categoriesList = Category::orderBy('name')->get();

        // AJAX RESPONSE
        if ($request->ajax()) {
            return response()->json([
                'html' => view('user.buku.partials.list', compact('books'))->render(),
                'total' => $books->total(),
            ]);
        }
        $panduanId = Category::where('name', 'Panduan Guru')->value('id');


        return view('user.buku.index', [
            'books' => $books,
            'categories' => $categoriesList, // ⚠️ NAMA KONSISTEN
            'panduanId' => $panduanId,

        ]);
    }



    public function download(Book $book)
    {
        // 1️⃣ Tambah total unduhan
        $book->increment('jumlah_unduh');

        // 2️⃣ SIMPAN LOG (INI YANG BARU)
        DownloadLog::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
        ]);

        // 3️⃣ Download file
        if (!$book->file_path || !Storage::disk('public')->exists($book->file_path)) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($book->file_path);
    }
}
