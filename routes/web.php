<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect()->route('login'));
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

    // Route khusus guru (nanti diisi: tugas, kelompok, penilaian, dll)
    Route::middleware('role:guru')->group(function () {
        //
    });

    // Route khusus murid (nanti diisi: kumpul tugas, karya, laporan, dll)
    Route::middleware('role:murid')->group(function () {
        //
    });
});
