<?php

use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\CekTipeUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Middleware\CekLogin;

Route::middleware([CekLogin::class])->group(function () {
    // Home dashboard
    Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
    // Tambah baru transaksi
    Route::get('/transaksi/create', [TransaksiController::class, 'create']);
    // Simpan transaksi
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    // Halaman laporan (harus VIP)
    Route::get('/laporan', [LaporanController::class, 'index'])->middleware(CekTipeUser::class);
    // TODO: Buat function edit, update, destroy di controller
    // Edit transaksi
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    // Update transaksi lama
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    // Hapus transaksi
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});
// Login halaman & aksi login
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Aksi logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
