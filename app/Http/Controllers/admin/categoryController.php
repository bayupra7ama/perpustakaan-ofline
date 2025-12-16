<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // LIST + PENCARIAN
    public function index(Request $request)
    {
        $query = Category::query();

        // filter pencarian nama kategori
        if ($search = $request->get('q')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $categories = $query->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.kategori.index', compact('categories', 'search'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.kategori.create');
    }

    // SIMPAN KATEGORI BARU
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
        ]);

        Category::create($data);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit(Category $kategori)
    {
        // $kategori diambil dari {kategori} di route resource
        return view('admin.kategori.edit', [
            'category' => $kategori,
        ]);
    }

    // UPDATE
    public function update(Request $request, Category $kategori)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
        ]);

        $kategori->update($data);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // HAPUS
    public function destroy(Category $kategori)
    {
        $kategori->delete();

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
