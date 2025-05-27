<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');
//admin routes
Route::middleware(['auth', 'can:admin'])->group(function () {
    //Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //brands
    Route::get('/admin/brands', [\App\Http\Controllers\BrandController::class, 'index'])->name('admin.brand');
    Route::get('/admin/brands/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('admin.brand.create');
    Route::get('/admin/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/admin/brands', [\App\Http\Controllers\BrandController::class, 'store'])->name('admin.brand.store');
    Route::delete('/admin/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('admin.brand.remove');
    Route::put('/admin/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'update'])->name('admin.brand.update');
});

//user routes
Route::middleware(['auth', 'verified'])->group(function () {

});

//profile routes
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
