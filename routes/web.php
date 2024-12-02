<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// PRODUCTS
Route::get('/products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('product.single');
Route::post('/products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'addToCart'])->name('add.cart');
Route::get('/cart', [App\Http\Controllers\Products\ProductsController::class, 'viewCart'])->name('cart');
Route::get('/cart/cart-delete/{id}', [App\Http\Controllers\Products\ProductsController::class, 'deleteProductCart'])->name('cart.product.delete');

// SERVICES
Route::get('/services', function () {
    return view('services');
});


// SERVICES
Route::get('/about', function () {
    return view('about');
});
