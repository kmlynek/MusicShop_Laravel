<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Strona główna
Route::get('/', [HomeController::class, 'index'])->name('home');

// Lista produktów
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/products/update/{id}', [ProductController::class, 'update']);
Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);

// Lista kategorii
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/categories/update/{id}', [CategoryController::class, 'update']);
Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy']);

// Lista marek
use App\Http\Controllers\BrandController;

Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brands/create', [BrandController::class, 'create']);
Route::post('/brands', [BrandController::class, 'store']);
Route::get('/brands/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brands/update/{id}', [BrandController::class, 'update']);
Route::get('/brands/delete/{id}', [BrandController::class, 'destroy']);
