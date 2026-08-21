<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogDownloadController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/', HomeController::class)->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/product/{product:slug}', [ProductsController::class, 'show'])->name('products.show');
Route::post('/catalog/download', CatalogDownloadController::class)->name('catalog.download');
