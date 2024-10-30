<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\UserUpgradeAkunController;
use App\Http\Controllers\Auth\CommentController;
use App\Http\Controllers\Auth\CommentReplyController;
use App\Http\Controllers\Auth\KegiatanController;
use App\Http\Controllers\Auth\kegiatanTerbaruController;
use App\Http\Controllers\Auth\UpgradeAkunController;
use App\Http\Controllers\Beranda\BerandaController;
use App\Http\Controllers\Beranda\CategoryController as BerandaCategoryController;
use App\Http\Controllers\Beranda\DonationController;
use App\Http\Controllers\CronJob\ProjectActive;
use App\Http\Controllers\Midtrans\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Donasi;
use App\Http\Middleware\MidtransConfig;
use App\Http\Middleware\Owner;
use Illuminate\Support\Facades\Route;

Route::get('sinkronisasi', ProjectActive::class)->name('sinkronisasi');

Route::get('/', [BerandaController::class, 'beranda'])->name('beranda');
Route::resource('donation', DonationController::class)->only(['index', 'show']);
Route::resource('categori', BerandaCategoryController::class)->only(['index', 'show']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::prefix('midtrans')->middleware(MidtransConfig::class)->group(function () {
    //     Route::get('/pay', function () {
    //         return view('auth.midtrans');
    //     });
    //     Route::post('/get-snap-token', [PaymentController::class, 'getSnapToken']);
    // });

    Route::get('/dashboard',  fn() => view('dashboard'))->name('dashboard');
    Route::resource('comment', CommentController::class)->only(['store', 'update', 'destroy']);
    Route::resource('comment-reply', CommentReplyController::class)->only(['store', 'update', 'destroy']);

    Route::middleware(Donasi::class)->group(function () {
        Route::resource('upgrade', UpgradeAkunController::class)->only(['index', 'store']);
    });
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kegiatan-terbaru', kegiatanTerbaruController::class);

    Route::post('donation', [DonationController::class, 'store'])->name('donation.store');
    Route::resource('category', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);

    Route::prefix('admin')->middleware(Admin::class)->group(function () {
        Route::resource('pembayaran', PembayaranController::class);
        Route::resource('upgrade-akun', UserUpgradeAkunController::class);
    });
});


require __DIR__ . '/auth.php';
