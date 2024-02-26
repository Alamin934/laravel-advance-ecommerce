<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController,CategoryController,SubCategoryController,ChildCategoryController, BrandsController,SettingController,ProductController,CouponController,OrderController,RoleController,UserController};
use App\Http\Controllers\Auth\socialiteLoginController;


Route::get('admin/login', [AdminController::class,'showLogin'])->middleware('guest')->name('admin.login');

// Dashboard Route
Route::get('admin/dashboard', [AdminController::class,'showDashboard'])->middleware(['roles:admin,moderator,editor'])->name('admin.dashboard');

Route::middleware(['roles:admin,moderator'])->group(function () {
     // Orders
    Route::resource('admin/order', OrderController::class);
    Route::controller(OrderController::class)->group(function () {
        // Order Filter Route
        Route::get('admin/order-status-filter', 'orderStatusFilter')->name('order.status.filter');
        Route::get('admin/payment-status-filter', 'paymentStatusFilter')->name('payment.status.filter');
        Route::get('admin/payment-type-filter', 'paymentTypeFilter')->name('payment.type.filter');
        // Order Status Route
        Route::post('admin/order/updateStatus', 'updateStatus')->name('order.update.status');
    });
});
Route::middleware(['roles:admin'])->group(function () {
    // Website Settings
    Route::prefix('admin/setting')->name('setting.')->controller(SettingController::class)->group(function () {
        Route::get('/smtp', 'stmpIndex')->name('smtp.index');
        Route::post('/smtp/{id}', 'stmpUpdate')->name('smtp.update');
        // Payment Method Setup Route
        Route::get('/bd-payment-getway', 'bdPaymentGetwayInfo')->name('bd.payment.getway');
        Route::post('/store-bd-payment-getway', 'storeBdPaymentGetway')->name('store.bd.payment.getway');
        Route::post('/delete-bd-payment-getway', 'deleteBdPaymentGetway')->name('delete.bd.payment.getway');
    });

    // Users
    Route::resource('admin/user', UserController::class);
    // Roles
    Route::resource('admin/role', RoleController::class);
});

Route::middleware(['roles:admin,moderator,editor'])->group(function () {
    // Categories Route
    Route::prefix('admin')->group(function () {
        Route::resource('/category', CategoryController::class);
        Route::get('/category/{id}', [CategoryController::class,'destroy'])->name('category.delete');
        Route::post('/category/update', [CategoryController::class,'update'])->name('update.category');
        // Sub & Child Category Route
        Route::resource('/subCategory', SubCategoryController::class);
        Route::resource('/childCategory', ChildCategoryController::class);

        // Brand Route
        Route::resource('/brand', BrandsController::class);
    });

    // Product Route
    Route::resource('admin/product', ProductController::class);
    Route::controller(ProductController::class)->group(function () {
        // Product Depended Cateogry Route
        Route::get('/dependedSubCategory/{id}', 'dependedSubCategory');
        Route::get('/dependedChildCategory/{id}', 'dependedChildCategory');
        // Product Status Route
        Route::post('/admin/product/changeFeatured/{status}', 'changeFeatured');
        Route::post('/admin/product/changeStatus/{status}', 'changeStatus');
        // Product Filter Route
        Route::post('/admin/product/filterProduct', 'filterProduct')->name('product.filter');
    });
    
    // Coupon
    Route::resource('admin/coupon', CouponController::class);
    
});

// Socialite Login Routes
Route::get('/auth/redirect', [socialiteLoginController::class, 'googleAuthRedirect'])->name('google.auth.redirect');
Route::get('/auth/callback', [socialiteLoginController::class, 'googleAuthCallback'])->name('google.auth.callback');



