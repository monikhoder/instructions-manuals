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

    //categories
    Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.remove');
    Route::put('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');

    //manuals
    Route::get('/admin/manuals', [\App\Http\Controllers\ManualController::class, 'index'])->name('admin.manual');
    Route::get('/admin/manuals/create', [\App\Http\Controllers\ManualController::class, 'create'])->name('admin.manual.create');
    Route::get('/admin/manuals/{manual}', [\App\Http\Controllers\ManualController::class, 'edit'])->name('admin.manual.edit');
    Route::post('/admin/manuals', [\App\Http\Controllers\ManualController::class, 'store'])->name('admin.manual.store');
    Route::delete('/admin/manuals/{manual}', [\App\Http\Controllers\ManualController::class, 'destroy'])->name('admin.manual.remove');
    Route::put('/admin/manuals/{manual}', [\App\Http\Controllers\ManualController::class, 'update'])->name('admin.manual.update');
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
