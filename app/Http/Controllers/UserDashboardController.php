<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class UserDashboardController extends Controller
{
    public function index()
    {
        $panduanId = Category::where('name', 'Panduan Guru')->value('id');

        // 4 kategori rekomendasi
        $recommendedCategories = Category::withCount('books')
            ->orderByDesc('books_count')
            ->take(5)
            ->get();

        // 5 buku paling sering diakses
        $popularBooks = Book::with('categories')
            ->orderByDesc('hit_count')
            ->take(5)
            ->get();

        // 5 buku terbaru
        $newBooks = Book::with('categories')
            ->latest()
            ->take(10)
            ->get();

        return view('user.dashboard', compact(
            'recommendedCategories',
            'popularBooks',
            'newBooks',
            'panduanId'

        ));
    }
}
