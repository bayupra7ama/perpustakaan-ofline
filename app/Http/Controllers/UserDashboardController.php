<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class UserDashboardController extends Controller
{
    public function index()
    {
        // 4 kategori rekomendasi
        $recommendedCategories = Category::withCount('books')
            ->orderByDesc('books_count')
            ->take(4)
            ->get();


        // 5 buku paling sering diakses
        $popularBooks = Book::with('category')
            ->orderByDesc('hit_count')
            ->take(5)
            ->get();

        // 5 buku terbaru ditambahkan
        $newBooks = Book::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact(
            'recommendedCategories',
            'popularBooks',
            'newBooks'
        ));
    }
}
