<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;

Route::get('/', function () {
    return redirect()->route('login');
});

// hanya untuk yang BELUM login
Route::middleware(['isGuest'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login.store');
});

// hanya untuk yang SUDAH login
Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // khusus guru
    Route::middleware(['isGuru'])->prefix('guru')->name('guru.')->group(function () {
        Route::get('/beranda', [BerandaController::class, 'guru'])->name('beranda');
        // route guru lainnya menyusul (tugas, kelompok, penilaian, dst)
    });

    // khusus murid
    Route::middleware(['isMurid'])->prefix('murid')->name('murid.')->group(function () {
        Route::get('/beranda', [BerandaController::class, 'murid'])->name('beranda');
        // route murid lainnya menyusul (tugas, karya, laporan, dst)
    });
});
