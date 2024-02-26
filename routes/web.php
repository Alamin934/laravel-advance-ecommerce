<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEnd\{HomeController,CartController,SettingController,CheckoutController,OrderController,DashboardController};
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    abort(404);
});

Route::controller(HomeController::class)->group(function () {
    // Home
    Route::get('/','index')->name('home');

    // Single Product
    Route::get('/single-product/{slug}','singleProduct')->name('single.product');

    // Wishlist
    Route::middleware(['auth'])->group(function () {
        Route::get('/wishlist','showWishlist')->name('show.wishlist');
        Route::get('/add-to-wishlist/{id}','addToWishlist')->name('add.wishlist');
        Route::get('/remove-to-wishlist/{id}','removeToWishlist')->name('remove.wishlist');
    });
    
    // Link Wise Product
    Route::get('/link-wise-product/{id}','linkWiseProduct')->name('linkWise.product');

    // Newsletter email store
    Route::post('/newsletter','newsLetter')->name('newsletter.store');

    // Contact Routes
    Route::get('/contact','contactIndex')->name('contact');
    Route::post('/contact','contactStore')->name('contact.store');
});

// Cart
Route::controller(CartController::class)->group(function () {
    Route::get('/cart','displayCart')->name('display.cart');
    Route::get('/add-to-cart','addToCart')->name('add.cart');

    Route::get('/update-qty/{id}','updateQty')->name('update.qty');
    Route::get('/update-size/{id}','updateSize')->name('update.size');
    Route::get('/update-color/{id}','updateColor')->name('update.color');
    Route::get('/remove-from-cart/{id}','removeFromCart')->name('remove.cart');
    Route::post('/empty-cart','emptyCart')->name('empty.cart');

});

// Checkout Routes
// Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/apply-coupon', [CheckoutController::class, 'applyCoupon'])->name('apply.coupon');
    Route::get('/remove-coupon', [CheckoutController::class, 'removeCoupon'])->name('remove.coupon');
// });

// Shop
Route::view('/shop','frontend.shop')->name('shop');

// Dashboard Sub Route
Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'showOrders'])->name('dashboard');
    // Orders route
    Route::get('/orders', [DashboardController::class, 'myOrders'])->name('orders');
    Route::get('/order-details/{id}', [DashboardController::class, 'orderDetails'])->name('order.details');

    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');

    // shipping
    Route::get('/settings',[SettingController::class, 'settings'])->name('settings');
    Route::post('/shipping',[SettingController::class, 'shippingStore'])->name('shipping.store');

    // Profile Information
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('success',[OrderController::class,'success'])->name('success')->middleware(['auth', 'verified']);
Route::post('fail',[OrderController::class,'fail'])->name('fail')->middleware(['auth', 'verified']);
Route::get('cancel',[OrderController::class,'cancel'])->name('cancel')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
