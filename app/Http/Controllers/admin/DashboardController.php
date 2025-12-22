<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

use App\Models\DownloadLog;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_buku' => Book::count(),
            'total_kategori' => Category::count(),
            'total_user' => User::count(),
            'total_unduhan' => DownloadLog::count(), // 🔥 REAL
        ];

        // ======================
        // BUKU TERBARU
        // ======================
        $latestBooks = Book::with('categories')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($book) {
                return [
                    'judul' => $book->judul,
                    'penulis' => $book->penulis,
                    'tahun' => $book->tahun_terbit ?? '-',
                    'kategori' => $book->categories->pluck('name')->implode(', ') ?: '-',
                ];
            });

        // ======================
        // AKTIVITAS UNDUHAN (REAL LOG)
        // ======================
        $recentDownloads = DownloadLog::with(['user', 'book'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($log) {
                return [
                    'judul' => $log->book->judul ?? '-',
                    'user' => $log->user->name ?? '-',
                    'waktu' => $log->created_at->diffForHumans(),
                ];
            });

        return view('dashboard', compact(
            'stats',
            'latestBooks',
            'recentDownloads'
        ));
    }
}
