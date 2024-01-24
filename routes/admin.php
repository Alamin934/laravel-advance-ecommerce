<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController,CategoryController};

Route::get('/admin/login', [AdminController::class, 'showLogin'])->middleware('guest')->name('admin.login');

Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->middleware(['is_admin.auth','is_admin'])->name('admin.dashboard');


Route::get('/admin/category', [CategoryController::class, 'index'])->middleware('is_admin')->name('admin.category.index');