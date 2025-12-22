<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserBookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guru\GuruBookController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LayananReferensiController;
use App\Http\Controllers\Guru\GuruDashboardController;

use App\Http\Controllers\LayananPerpustakaanController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    return match (auth()->user()->role) {
        'admin' => redirect()->route('admin.dashboard'),
        // 'guru' => redirect()->route('guru.dashboard'),
        default => redirect()->route('user.dashboard'),
    };
});

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN & REGISTER)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

/*
|--------------------------------------------------------------------------
| ROUTE WAJIB LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | USER AREA
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:user,guru'])
        ->prefix('user')
        ->name('user.')
        ->group(function () {

            Route::get('/dashboard', [UserDashboardController::class, 'index'])
                ->name('dashboard');

            Route::view('/koleksi', 'user.koleksi')->name('koleksi');
            Route::view('/kategori', 'user.kategori')->name('kategori');
            Route::view('/peta', 'user.peta')->name('peta');

            Route::get('/buku', [UserBookController::class, 'index'])
                ->name('buku.index');

            Route::get('/buku/kelas/{kelas}', [UserBookController::class, 'byKelas'])
                ->name('buku.kelas');

            Route::get('/panduan', [GuruBookController::class, 'index'])
                ->name('panduan.index');

            // Route::get('/panduan/ajax', [GuruBookController::class, 'ajax'])
            //     ->name('panduan.ajax');
    
            Route::get('/buku/{book}', [UserBookController::class, 'show'])
                ->name('buku.show');
            Route::get('/buku/{book}/download', [UserBookController::class, 'download'])
                ->name('buku.download');



        });


    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA (BELUM ROLE, MASIH AUTH SAJA)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('buku', AdminBookController::class);
        Route::resource('kategori', AdminCategoryController::class);
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });



    Route::middleware(['auth', 'role:guru'])
        ->prefix('guru')
        ->name('guru.')
        ->group(function () {


            Route::get('/panduan/create', [GuruBookController::class, 'create'])
                ->name('panduan.create');

            Route::post('/panduan', [GuruBookController::class, 'store'])
                ->name('panduan.store');
        });

    // //gurus
    // Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    //     Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
    //     // nanti: validasi peminjaman, laporan, dll
    // });


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::prefix('tentang')->group(function () {
    Route::view('/struktur-organisasi', 'tentang.struktur')->name('tentang.struktur');
    Route::view('/sejarah', 'tentang.sejarah')->name('tentang.sejarah');
    Route::view('/visi-misi', 'tentang.visimisi')->name('tentang.visimisi');
});
