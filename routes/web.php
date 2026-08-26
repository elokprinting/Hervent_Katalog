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
Route::view('/gift-sets-packages', 'gift-sets-packages')->name('giftsets.index');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/product/{product:slug}', [ProductsController::class, 'show'])->name('products.show');
Route::post('/catalog/download', CatalogDownloadController::class)->name('catalog.download');
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductionBlogController;
use App\Http\Controllers\ProductionAuthController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Production Login (tidak perlu middleware)
Route::get('/production/login', [ProductionAuthController::class, 'showLogin'])->name('production.login');
Route::post('/production/login', [ProductionAuthController::class, 'login'])->middleware('throttle:5,5')->name('production.login.submit');
Route::post('/production/logout', [ProductionAuthController::class, 'logout'])->name('production.logout');

// Production Area (dilindungi middleware password)
Route::prefix('production')->middleware(\App\Http\Middleware\ProductionAccess::class)->group(function () {
    Route::get('/blog-editor', [ProductionBlogController::class, 'index'])->name('production.blog.index');
    Route::post('/blog/store', [ProductionBlogController::class, 'store'])->name('production.blog.store');
    Route::post('/product/store', [ProductionBlogController::class, 'storeProduct'])->name('production.product.store');
});
