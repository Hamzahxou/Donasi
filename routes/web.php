<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Auth\KegiatanController;
use App\Http\Controllers\Beranda\DonationController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;




Route::get('/', fn() => view('welcome'))->name('beranda');
Route::resource('donation', DonationController::class)->only(['index', 'show']);

Route::get('/dashboard',  fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('kegiatan', KegiatanController::class);


    Route::prefix('admin')->middleware(Admin::class)->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('pembayaran', PembayaranController::class);
    });
});


require __DIR__ . '/auth.php';
