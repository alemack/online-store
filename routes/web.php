<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
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



// Route::get('cart', [CartController::class, 'show'])->name('cart.show');
// Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
// Route::post('/cart/remove/{product_id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/category/{category}', 'HomeController@category')->name('category'.show);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category?}', [HomeController::class, 'category'])->name('category');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('cart')->group(function () {
    Route::get('/', [ShowCartController::class, 'show'])->name('cart.show');
    Route::post('/add', [AddToCartController::class, 'addToCart'])->name('cart.add');
    Route::post('/remove/{productId}', [RemoveFromCartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/clear', [RemoveFromCartController::class, 'clear'])->name('cart.clear');
});
