<?php

use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\CekTipeUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Middleware\CekLogin;

Route::middleware([CekLogin::class])->group(function () {
    Route::get('/', [TransaksiController::class, 'index']);

    Route::get('/transaksi/create', [TransaksiController::class, 'create']);

    Route::post('/transaksi', [TransaksiController::class, 'store']);

    Route::get('/laporan', [LaporanController::class, 'index'])->middleware(CekTipeUser::class);
});

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
