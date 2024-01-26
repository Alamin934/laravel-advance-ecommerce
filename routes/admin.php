<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController,CategoryController,SubCategoryController};

Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'showLogin')->middleware('guest')->name('login');
    
    Route::get('/dashboard', 'showDashboard')->middleware(['is_admin.auth','is_admin'])->name('dashboard');
});


Route::prefix('admin')->middleware('is_admin')->controller(CategoryController::class)->group(function () {
    Route::get('category/{id}', 'destroy')->name('category.delete');
    Route::post('category/update', 'update')->name('update.category');
});


Route::resource('admin/category', CategoryController::class)->middleware('is_admin');
Route::resource('admin/subCategory', SubCategoryController::class)->middleware('is_admin');

Route::fallback(function () {
    abort(404);
});