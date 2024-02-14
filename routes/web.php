<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Cart\ShowCartController;
use App\Http\Controllers\Cart\AddToCartController;
use App\Http\Controllers\Cart\RemoveFromCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/category/{category?}', [CategoryController::class, 'category'])->name('category');
});

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('cart')->group(function () {
    Route::get('/', [ShowCartController::class, 'show'])->name('cart.show');
    Route::post('/add', [AddToCartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/clear', [RemoveFromCartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/remove/{product_id}', [RemoveFromCartController::class, 'remove'])->name('cart.remove');
});
