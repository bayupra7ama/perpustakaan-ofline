<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruBookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::whereHas('categories', function ($q) {
            $q->where('name', 'Panduan Guru');
        });

        // SEARCH
        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->q . '%')
                    ->orWhere('penulis', 'like', '%' . $request->q . '%');
            });
        }

        // FILTER KELAS
        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        $books = $query->latest()->paginate(10)->withQueryString();

        // AJAX REQUEST → RETURN PARTIAL LIST
        if ($request->ajax()) {
            return view('user.buku.partials.list', compact('books'))->render();
        }

        // NORMAL LOAD
        return view('user.buku.panduan_guru', compact('books'));
    }

    // public function ajax(Request $request)
    // {
    //     $books = $this->queryBooks($request)->paginate(10)->withQueryString();

    //     return response()->json([
    //         'html' => view('user.buku.partials.list', compact('books'))->render(),
    //         'pagination' => $books->links('vendor.pagination.tailwind')->render(),
    //     ]);
    // }

    private function queryBooks(Request $request)
    {
        $query = Book::whereHas('categories', function ($q) {
            $q->where('name', 'Panduan Guru');
        });

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->q . '%')
                    ->orWhere('penulis', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        if ($request->filled('categories')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('categories.id', $request->categories);
            });
        }

        return $query->latest();
    }


    public function create()
    {
        return view('guru.panduan.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['nullable', 'string'],
            'tahun_terbit' => ['nullable', 'digits:4'],
            'kelas' => ['nullable', 'string'],
            'file' => ['required', 'mimes:pdf', 'max:10240'],
            'cover' => ['nullable', 'image', 'max:2048'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
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

        // 🔥 KATEGORI WAJIB: PANDUAN GURU
        $panduanId = Category::where('name', 'Panduan Guru')->value('id');

        // kategori tambahan dari form
        $extraCategories = $request->input('categories', []);

        // pastikan panduan guru SELALU ADA & TIDAK BISA DIHAPUS
        $finalCategories = collect($extraCategories)
            ->push($panduanId)
            ->unique()
            ->values()
            ->toArray();

        $book->categories()->sync($finalCategories);

        return redirect()
            ->route('user.buku.index', ['categories' => [$panduanId]])
            ->with('success', 'Panduan guru berhasil ditambahkan');
    }


}
