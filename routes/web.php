<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\Admin\OutletController as AdminOutletController;
use App\Http\Controllers\Admin\DivisionController as AdminDivisionController;
use App\Http\Controllers\Outlet\ProductController as OutletProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Awal & Rute Otentikasi
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Grup Rute yang memerlukan login
Route::middleware(['auth'])->group(function () {

    // RUTE PROFIL DI SINI
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/profile/password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Rute untuk ADMIN
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::patch('/orders/{order}/approve', [AdminController::class, 'approveOrder'])->name('approveOrder');
        Route::get('/recap', [AdminController::class, 'transactionRecap'])->name('recap');
        Route::resource('outlet-users', \App\Http\Controllers\Admin\OutletUserController::class);

        // --- PERBAIKAN URUTAN RUTE ---
        // Rute spesifik ('/approved') harus didefinisikan SEBELUM rute parameter ('/{order}').
        Route::get('/orders/approved', [AdminController::class, 'approvedOrders'])->name('orders.approved');
        Route::get('/orders/{order}', [AdminController::class, 'show'])->name('orders.show');
        Route::post('/orders/{order}/payments', [AdminController::class, 'storePayment'])->name('orders.payments.store');
        // --- AKHIR PERBAIKAN ---

        Route::resource('outlets', AdminOutletController::class);
        Route::resource('divisions', AdminDivisionController::class);
    });

    // Rute untuk OUTLET
    Route::middleware(['role:outlet'])->prefix('outlet')->name('outlet.')->group(function () {
        Route::get('/dashboard', [OutletController::class, 'dashboard'])->name('dashboard');
        Route::patch('/orders/{order}/complete', [OutletController::class, 'completeOrder'])->name('completeOrder');
        Route::get('/transactions', [OutletController::class, 'transactions'])->name('transactions');
        Route::resource('products', OutletProductController::class);
    });

    // Rute untuk DIVISI
    Route::middleware(['role:divisi'])->prefix('divisi')->name('divisi.')->group(function () {
        Route::get('/dashboard', [DivisiController::class, 'dashboard'])->name('dashboard');
        Route::get('/order/create', [DivisiController::class, 'createOrder'])->name('createOrder');
        Route::post('/order/store', [DivisiController::class, 'storeOrder'])->name('storeOrder');
    });

});
