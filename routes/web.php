<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;

// Strona główna (widok zalezy od uzytkownika)
Route::get('/', [HomeController::class, 'index']);

// Produkty – tylko dla zalogowanych
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
});

// Produkty – tylko dla admina (CRUD)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/products/update/{id}', [ProductController::class, 'update']);
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);

    // Kategorie
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/categories/update/{id}', [CategoryController::class, 'update']);
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy']);

    // Marki
    Route::get('/brands', [BrandController::class, 'index']);
    Route::get('/brands/create', [BrandController::class, 'create']);
    Route::post('/brands', [BrandController::class, 'store']);
    Route::get('/brands/edit/{id}', [BrandController::class, 'edit']);
    Route::post('/brands/update/{id}', [BrandController::class, 'update']);
    Route::get('/brands/delete/{id}', [BrandController::class, 'destroy']);
});


// Tylko dla zalogowanych użytkowników 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Domyślne przekierowanie po logowaniu 
Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
