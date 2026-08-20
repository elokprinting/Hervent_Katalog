<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogDownloadController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::post('/catalog/download', CatalogDownloadController::class)->name('catalog.download');
