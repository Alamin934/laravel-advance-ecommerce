<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController,CategoryController};

Route::get('/admin/login', [AdminController::class, 'showLogin'])->middleware('guest')->name('admin.login');

Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->middleware(['is_admin.auth','is_admin'])->name('admin.dashboard');


Route::get('category/{id}', [CategoryController::class, 'destroy'])->middleware('is_admin')->name('category.delete');
Route::post('category/update', [CategoryController::class, 'update'])->middleware('is_admin')->name('update.category');

Route::resource('category', CategoryController::class)->middleware('is_admin');

Route::fallback(function () {
    abort(404);
});