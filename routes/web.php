<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasyarakatController;

Route::redirect('/', '/login');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::view('/pengaduan', 'pengaduan');
    Route::prefix('admin')->controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
        Route::get('/pengaduan', 'pengaduan');
    });

    Route::prefix('masyarakat')->controller(MasyarakatController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
    });

    Route::prefix('petugas')->controller(PetugasController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::post('/pengaduan/{id}/acc', 'acc')->name('pengaduan.acc');
    });

    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

    Route::controller(TanggapanController::class)->group(function () {
        Route::get('/tanggapan/{id}', 'create');
        Route::post('/tanggapan', 'store')->name('tanggapan.store');
    });

});