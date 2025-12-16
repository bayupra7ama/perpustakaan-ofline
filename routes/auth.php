<?php 

use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

