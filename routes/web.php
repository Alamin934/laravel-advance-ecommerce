<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEnd\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/single-product/{slug}', [HomeController::class, 'singleProduct'])->name('single.product');
Route::get('/add-to-wishlist/{id}', [HomeController::class, 'addToWishlist'])->name('add.wishlist');
Route::view('/shop','frontend.shop')->name('shop');


Route::get('/dashboard', function () {
    if(auth()->user()->is_admin === 1){
        return redirect()->route('admin.dashboard');
    }else{
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
