<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/admin/login', [AdminController::class, 'showLogin'])->middleware('guest')->name('admin.login');

Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->middleware(['is_admin','auth'])->name('admin.dashboard');