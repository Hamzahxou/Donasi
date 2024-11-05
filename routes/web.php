<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\UserUpgradeAkunController;
use App\Http\Controllers\Auth\CommentController;
use App\Http\Controllers\Auth\CommentReplyController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\KegiatanController;
use App\Http\Controllers\Auth\kegiatanTerbaruController;
use App\Http\Controllers\Auth\UpgradeAkunController;
use App\Http\Controllers\Beranda\BerandaController;
use App\Http\Controllers\Beranda\DonationController;
use App\Http\Controllers\CronJob\ProjectActive;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\AdminOwner;
use App\Http\Middleware\Donasi;
use App\Http\Middleware\OwnerDonor;
use Illuminate\Support\Facades\Route;


Route::get('sinkronisasi', ProjectActive::class)->name('sinkronisasi');

Route::get('/', [BerandaController::class, 'beranda'])->name('beranda');
Route::resource('donation', DonationController::class)->only(['index', 'show']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard',  DashboardController::class)->middleware(OwnerDonor::class)->name('dashboard');
    Route::resource('comment', CommentController::class)->only(['store', 'update', 'destroy']);
    Route::resource('comment-reply', CommentReplyController::class)->only(['store', 'update', 'destroy']);
    Route::post('donation', [DonationController::class, 'store'])->name('donation.store');
    Route::put('donation/{id}', [DonationController::class, 'update'])->name('donation.update');

    Route::middleware(Donasi::class)->group(function () {
        Route::resource('upgrade', UpgradeAkunController::class)->only(['index', 'store']);
    });

    Route::middleware(AdminOwner::class)->group(function () {
        Route::resource('kegiatan', KegiatanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('kegiatan-terbaru', kegiatanTerbaruController::class)->only(['store', 'update', 'destroy']);

        Route::resource('category', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    });
    Route::middleware(Admin::class)->group(function () {
        Route::get('admin-dashboard', Dashboard::class)->name('admin.dashboard');
        Route::resource('pembayaran', PembayaranController::class)->only(['index', 'update', 'destroy']);
        Route::post('pembayaran/{id}/restore', [PembayaranController::class, 'restore'])->name('pembayaran.restore');
        Route::resource('upgrade-akun', UserUpgradeAkunController::class)->only(['index', 'update', 'destroy']);
    });
});


require __DIR__ . '/auth.php';
