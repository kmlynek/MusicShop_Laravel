<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// Strona główna
Route::get('/', [HomeController::class, 'index'])->name('home');

// Lista produktów
Route::get('/products', [ProductController::class, 'index'])->name('products.index');