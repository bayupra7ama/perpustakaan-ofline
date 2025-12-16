<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\LayananPerpustakaanController;
use App\Http\Controllers\LayananReferensiController;
use App\Http\Controllers\UserBookController;


// =====================
// ROOT -> REDIRECT KE DASHBOARD ADMIN
// =====================
Route::get('/', function () {
    return redirect()->route('dashboard');
});

route::middleware('auth')->group(function () {

    // ... route lain yang sudah ada

    // ======== BUKU ELEKTRONIK (USER) ========

    // Buku Kelas 7 / 8 / 9
    Route::get('/user/buku/kelas/{kelas}', [UserBookController::class, 'byKelas'])
        ->name('user.buku.kelas');

    // Panduan Guru
    Route::get('/user/buku/panduan-guru', [UserBookController::class, 'panduanGuru'])
        ->name('user.buku.panduan');
});

Route::middleware('auth')->group(function () {

    // yang baru (dropdown)
    Route::prefix('user/layanan-perpustakaan')->group(function () {
        Route::get('/baca-di-tempat', [LayananPerpustakaanController::class, 'bacaDiTempat'])->name('layanan.baca');
        Route::get('/sirkulasi', [LayananPerpustakaanController::class, 'sirkulasi'])->name('layanan.sirkulasi');
        Route::get('/referensi', [LayananPerpustakaanController::class, 'referensi'])->name('layanan.referensi');
        Route::get('/penelusuran-informasi', [LayananPerpustakaanController::class, 'penelusuranInformasi'])->name('layanan.penelusuran');
    });

});

Route::prefix('user/layanan-referensi')->name('referensi.')->group(function () {
    Route::get('/meja-informasi', [LayananReferensiController::class, 'mejaInformasi'])->name('meja');
    Route::get('/konsultasi', [LayananReferensiController::class, 'konsultasi'])->name('konsultasi');
    Route::get('/kesiagaan-informasi', [LayananReferensiController::class, 'kesiagaanInformasi'])->name('kesiagaan');
});

// =====================
// ROUTE YANG WAJIB LOGIN (auth)
// =====================
Route::middleware('auth')->group(function () {

    // ---------------------
    // DASHBOARD ADMIN
    // ---------------------
    Route::get('/dashboard', function () {

        // DATA DUMMY SEMENTARA
        $stats = [
            'total_buku'      => 120,
            'total_kategori'  => 18,
            'total_user'      => 230,
            'total_unduhan'   => 540,
        ];

        $latestBooks = [
            ['judul' => 'Biologi Kelas IX',  'kategori' => 'Biologi',    'penulis' => 'Siti Rahma',   'tahun' => 2023],
            ['judul' => 'Matematika Dasar', 'kategori' => 'Matematika', 'penulis' => 'Budi Santoso', 'tahun' => 2022],
            ['judul' => 'Bahasa Indonesia', 'kategori' => 'Bahasa',     'penulis' => 'Dewi Lestari', 'tahun' => 2021],
            ['judul' => 'Fisika untuk SMP', 'kategori' => 'Fisika',     'penulis' => 'R. Hidayat',   'tahun' => 2020],
        ];

        $recentDownloads = [
            ['user' => 'Siswa - Ahmad',   'judul' => 'Biologi Kelas IX',  'waktu' => '2025-11-25 09:15'],
            ['user' => 'Guru - Ibu Sari', 'judul' => 'Matematika Dasar', 'waktu' => '2025-11-25 08:50'],
            ['user' => 'Siswa - Lina',    'judul' => 'Bahasa Indonesia', 'waktu' => '2025-11-24 15:20'],
            ['user' => 'Siswa - Rudi',    'judul' => 'Fisika untuk SMP', 'waktu' => '2025-11-24 14:05'],
        ];

        return view('dashboard', compact('stats', 'latestBooks', 'recentDownloads'));
    })->name('dashboard');

    // ---------------------
    // DASHBOARD & HALAMAN USER
    // ---------------------

    // Beranda User
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    // Koleksi Buku
    Route::get('/user/koleksi', function () {
        return view('user.koleksi');
    })->name('user.koleksi');

    // Kategori Buku
    Route::get('/user/kategori', function () {
        return view('user.kategori');
    })->name('user.kategori');

    // ---------------------
    // LAYANAN PERPUSTAKAAN (USER)
// ---------------------
    Route::prefix('user/layanan-perpustakaan')->name('layanan.')->group(function () {
    Route::get('/peminjaman', [LayananPerpustakaanController::class, 'peminjaman'])
        ->name('peminjaman');

    Route::get('/tata-tertib', [LayananPerpustakaanController::class, 'tataTertib'])
        ->name('tatatertib');
    });


    // LAYANAN REFERENSI (USER)
    Route::prefix('user/layanan-referensi')->name('referensi.')->group(function () {

        // Koleksi Referensi
        Route::get('/koleksi', [LayananReferensiController::class, 'koleksi'])
            ->name('koleksi');

        // Bantuan Penelusuran Informasi
        Route::get('/bantuan', [LayananReferensiController::class, 'bantuan'])
            ->name('bantuan');
    });

    // ---------------------
    // ADMIN: KATEGORI (CRUD)
    // ---------------------
    Route::resource('admin/kategori', AdminCategoryController::class)
        ->names([
            'index'   => 'admin.kategori.index',
            'create'  => 'admin.kategori.create',
            'store'   => 'admin.kategori.store',
            'edit'    => 'admin.kategori.edit',
            'update'  => 'admin.kategori.update',
            'destroy' => 'admin.kategori.destroy',
        ]);

    // BUKU ADMIN (Koleksi Buku)
    Route::resource('admin/buku', AdminBookController::class)
        ->names([
            'index'   => 'admin.buku.index',
            'create'  => 'admin.buku.create',
            'store'   => 'admin.buku.store',
            'edit'    => 'admin.buku.edit',
            'update'  => 'admin.buku.update',
            'destroy' => 'admin.buku.destroy',
        ])->except(['show']);

    // ---------------------
    // LOGOUT (HANYA UNTUK USER YANG SUDAH LOGIN)
    // ---------------------
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});

// =====================
// HALAMAN TENTANG KAMI (BISA DIAKSES SIAPA SAJA)
// =====================

Route::get('/tentang/struktur-organisasi', function () {
    return view('tentang.struktur');
})->name('tentang.struktur');

Route::get('/tentang/sejarah', function () {
    return view('tentang.sejarah');
})->name('tentang.sejarah');

Route::get('/tentang/visi-misi', function () {
    return view('tentang.visimisi');
})->name('tentang.visimisi');

// =====================
// AUTH (LOGIN / REGISTER)
// =====================

// Form login
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

// Form register (pendaftaran siswa)
Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register');

// Proses register
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.post');
 
 // Halaman Peta (khusus)
Route::get('/user/peta', function () {
    return view('user.peta');
})->name('user.peta');
