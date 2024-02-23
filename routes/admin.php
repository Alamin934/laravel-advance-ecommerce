<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController,CategoryController,SubCategoryController,ChildCategoryController, BrandsController,SettingController,ProductController,CouponController,OrderController,RoleController,UserController};
use App\Http\Controllers\Auth\socialiteLoginController;


Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'showLogin')->middleware('guest')->name('login');
    
    Route::get('/dashboard', 'showDashboard')->middleware([ 'roles:admin','is_admin.auth','is_admin'])->name('dashboard');
});

Route::prefix('admin')->middleware(['is_admin.auth','is_admin', 'roles:admin'])->controller(CategoryController::class)->group(function () {
    Route::get('category/{id}', 'destroy')->name('category.delete');
    Route::post('category/update', 'update')->name('update.category');
});

Route::middleware(['is_admin.auth','is_admin', 'roles:admin'])->group(function () {
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/subCategory', SubCategoryController::class);
    Route::resource('admin/childCategory', ChildCategoryController::class);
    Route::resource('admin/brand', BrandsController::class);

    Route::resource('admin/product', ProductController::class);

    Route::get('/dependedSubCategory/{id}', [ProductController::class, 'dependedSubCategory']);
    Route::get('/dependedChildCategory/{id}', [ProductController::class, 'dependedChildCategory']);
    Route::post('/admin/product/changeFeatured/{status}', [ProductController::class, 'changeFeatured']);
    Route::post('/admin/product/changeStatus/{status}', [ProductController::class, 'changeStatus']);
    Route::post('/admin/product/filterProduct', [ProductController::class, 'filterProduct'])->name('product.filter');
    
    // Coupon
    Route::resource('admin/coupon', CouponController::class);
    
    // Orders
    Route::resource('admin/order', OrderController::class);
    Route::get('admin/order-status-filter', [OrderController::class, 'orderStatusFilter'])->name('order.status.filter');
    Route::get('admin/payment-status-filter', [OrderController::class, 'paymentStatusFilter'])->name('payment.status.filter');
    Route::get('admin/payment-type-filter', [OrderController::class, 'paymentTypeFilter'])->name('payment.type.filter');
    Route::post('admin/order/updateStatus', [OrderController::class, 'updateStatus'])->name('order.update.status');
    
    // Website Settings
    Route::prefix('admin/setting')->name('setting.')->controller(SettingController::class)->group(function () {
        Route::get('/smtp', 'stmpIndex')->name('smtp.index');
        Route::post('/smtp/{id}', 'stmpUpdate')->name('smtp.update');

        Route::get('/bd-payment-getway', 'bdPaymentGetwayInfo')->name('bd.payment.getway');
        Route::post('/store-bd-payment-getway', 'storeBdPaymentGetway')->name('store.bd.payment.getway');
        Route::post('/delete-bd-payment-getway', 'deleteBdPaymentGetway')->name('delete.bd.payment.getway');
    });

    // Users
    Route::resource('admin/user', UserController::class)->middleware('roles:admin');

    // Roles
    Route::resource('admin/role', RoleController::class);
});

// Socialite Login Routes
Route::get('/auth/redirect', [socialiteLoginController::class, 'googleAuthRedirect'])->name('google.auth.redirect');
Route::get('/auth/callback', [socialiteLoginController::class, 'googleAuthCallback'])->name('google.auth.callback');



