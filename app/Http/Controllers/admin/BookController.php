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

        $books = Book::with('categories')
            ->when($q, function ($query) use ($q) {
                $query->where('judul', 'like', "%{$q}%")
                    ->orWhere('penulis', 'like', "%{$q}%");
            })
            ->latest()
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
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['nullable', 'string'],
            'tahun_terbit' => ['nullable', 'digits:4'],
            'kelas' => ['nullable', 'string'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:categories,id'],
            'file' => ['nullable', 'mimes:pdf', 'max:10240'],
            'cover' => ['nullable', 'image', 'max:2048'],
        ]);

        // upload file buku
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')
                ->store('books/files', 'public');
        }

        // upload cover
        if ($request->hasFile('cover')) {
            $data['cover_path'] = $request->file('cover')
                ->store('books/covers', 'public');
        }

        $data['hit_count'] = 0;
        $data['jumlah_akses'] = 0;
        $data['jumlah_unduh'] = 0;
        $data['is_active'] = true;

        $book = Book::create($data);

        // SIMPAN RELASI KATEGORI
        $book->categories()->sync($request->categories);

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }



    // FORM EDIT
    public function edit(Book $buku)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.buku.edit', [
            'book' => $buku,
            'categories' => $categories,
        ]);
    }

    // UPDATE
    public function update(Request $request, Book $buku)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['nullable', 'string', 'max:255'],
            'tahun_terbit' => ['nullable', 'digits:4'],
            'kelas' => ['nullable', 'string'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:categories,id'],
            'file' => ['nullable', 'mimes:pdf', 'max:10240'],
            'cover' => ['nullable', 'image', 'max:2048'],
        ]);

        // upload file baru (jika ada)
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')
                ->store('books/files', 'public');
        }

        // upload cover baru (jika ada)
        if ($request->hasFile('cover')) {
            $data['cover_path'] = $request->file('cover')
                ->store('books/covers', 'public');
        }

        // update data utama
        $buku->update($data);

        // sync kategori (many-to-many)
        $buku->categories()->sync($request->categories);

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
