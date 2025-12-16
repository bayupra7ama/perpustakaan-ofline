<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // LIST KOLEKSI BUKU
    public function index(Request $request)
    {
        $q = $request->input('q');

        $books = Book::with('category')
            ->when($q, function ($query) use ($q) {
                $query->where('judul', 'like', "%{$q}%")
                      ->orWhere('penulis', 'like', "%{$q}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.buku.index', compact('books', 'q'));
    }

    // FORM TAMBAH BUKU
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.buku.create', compact('categories'));
    }

    // SIMPAN BUKU BARU
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'        => ['required', 'string', 'max:255'],
            'penulis'      => ['required', 'string', 'max:255'],
            'penerbit'     => ['nullable', 'string', 'max:255'],
            'tahun_terbit' => ['nullable', 'digits:4'],
            'category_id'  => ['required', 'exists:categories,id'],
        ], [
            'judul.required'        => 'Judul buku wajib diisi.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'category_id.required'  => 'Kategori wajib dipilih.',
            'category_id.exists'    => 'Kategori tidak ditemukan.',
        ]);

        // nilai tambahan default
        $data['hit_count'] = 0;     // jumlah akses awal
        $data['file_path'] = null;  // sementara belum ada file yang di-upload

        Book::create($data);

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit(Book $buku)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.buku.edit', [
            'book'       => $buku,
            'categories' => $categories,
        ]);
    }

    // UPDATE
    public function update(Request $request, Book $buku)
    {
        $data = $request->validate([
            'judul'        => ['required', 'string', 'max:255'],
            'penulis'      => ['required', 'string', 'max:255'],
            'penerbit'     => ['nullable', 'string', 'max:255'],
            'tahun_terbit' => ['nullable', 'digits:4'],
            'category_id'  => ['required', 'exists:categories,id'],
        ]);

        $buku->update($data);

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    // HAPUS
    public function destroy(Book $buku)
    {
        $buku->delete();

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
