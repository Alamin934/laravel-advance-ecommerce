<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEnd\{HomeController,CartController};
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    // Home
    Route::get('/','index')->name('home');

    // Single Product
    Route::get('/single-product/{slug}','singleProduct')->name('single.product');

    // Wishlist
    Route::get('/wishlist','showWishlist')->name('show.wishlist');
    Route::get('/add-to-wishlist/{id}','addToWishlist')->name('add.wishlist');
    Route::get('/remove-to-wishlist/{id}','removeToWishlist')->name('remove.wishlist');
    
    // Link Wise Product
    Route::get('/link-wise-product/{id}','linkWiseProduct')->name('linkWise.product');
});

// Cart
Route::controller(CartController::class)->group(function () {
    Route::get('/add-to-cart','addToCart')->name('add.cart');
    Route::get('/cart','displayCart')->name('display.cart');
    Route::get('/update-qty/{id}','updateQty')->name('update.qty');
    Route::get('/update-size/{id}','updateSize')->name('update.size');
    Route::get('/update-color/{id}','updateColor')->name('update.color');
    Route::get('/remove-from-cart/{id}','removeFromCart')->name('remove.cart');
});

// Shop
Route::view('/shop','frontend.shop')->name('shop');

// Dashboard
Route::get('/dashboard', function () {
    if(auth()->user()->is_admin === 1){
        return redirect()->route('admin.dashboard');
    }else{
        return view('frontend.dashboard.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard.dashboard');

// Dashboard Sub Route
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::view('/orders','frontend.dashboard.orders')->name('orders');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
