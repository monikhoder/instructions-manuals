<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManualController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('manual/{manual:slug}', [HomeController::class, 'showManual'])->name('manual.show');
Route::get('manual/{manual:slug}/view', [ManualController::class, 'view'])->name('manual.view');
Route::get('manual/{manual:slug}/download', [ManualController::class, 'download'])->name('manual.download');
Route::get('brand/{brand:slug}', [HomeController::class, 'showBrand'])->name('brand.show');
//admin routes
Route::middleware(['auth', 'can:admin'])->group(function () {
    //Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //brands
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brand');
    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::get('/admin/brands/{brand}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/admin/brands', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::delete('/admin/brands/{brand}', [BrandController::class, 'destroy'])->name('admin.brand.remove');
    Route::put('/admin/brands/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');

    //categories
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/admin/categories/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.category.remove');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.category.update');

    //manuals
    Route::get('/admin/manuals', [ManualController::class, 'index'])->name('admin.manual');
    Route::get('/admin/manuals/create', [ManualController::class, 'create'])->name('admin.manual.create');
    Route::get('/admin/manuals/{manual}', [ManualController::class, 'edit'])->name('admin.manual.edit');
    Route::post('/admin/manuals', [ManualController::class, 'store'])->name('admin.manual.store');
    Route::delete('/admin/manuals/{manual}', [ManualController::class, 'destroy'])->name('admin.manual.remove');
    Route::put('/admin/manuals/{manual}', [ManualController::class, 'update'])->name('admin.manual.update');

    //users
    Route::get('/admin/users', [UserManagerController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UserManagerController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/users/{user}', [UserManagerController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users', [UserManagerController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/users/{user}', [UserManagerController::class, 'destroy'])->name('admin.users.remove');
    Route::put('/admin/users/{user}', [UserManagerController::class, 'ban'])->name('admin.users.ban');
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
