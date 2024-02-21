<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController,CategoryController,SubCategoryController,ChildCategoryController, BrandsController,SettingController,ProductController,CouponController};


Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'showLogin')->middleware('guest')->name('login');
    
    Route::get('/dashboard', 'showDashboard')->middleware(['is_admin.auth','is_admin'])->name('dashboard');
});

Route::prefix('admin')->middleware(['is_admin.auth','is_admin'])->controller(CategoryController::class)->group(function () {
    Route::get('category/{id}', 'destroy')->name('category.delete');
    Route::post('category/update', 'update')->name('update.category');
});

Route::middleware(['is_admin.auth','is_admin'])->group(function () {
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
    
    Route::resource('admin/coupon', CouponController::class);
    
    // Website Settings
    Route::prefix('admin/setting')->name('setting.')->controller(SettingController::class)->group(function () {
        Route::get('/smtp', 'stmpIndex')->name('smtp.index');
        Route::post('/smtp/{id}', 'stmpUpdate')->name('smtp.update');

        Route::get('/bd-payment-getway', 'bdPaymentGetwayInfo')->name('bd.payment.getway');
        Route::post('/store-bd-payment-getway', 'storeBdPaymentGetway')->name('store.bd.payment.getway');
        Route::post('/delete-bd-payment-getway', 'deleteBdPaymentGetway')->name('delete.bd.payment.getway');
    });


});



