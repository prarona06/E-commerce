<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->group(function () {

    # dashboard
    Route::get('/', [AdminController::class, 'index'])
    ->name('admin.dashboard')->middleware('admin.auth');

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login-form', 'showLoginForm')->name('admin.login')
        ->middleware('guest.check');
        Route::post('/login', 'login')->name('admin.login.submit');
        Route::post('/logout', 'logout')->name('admin.logout')
        ->middleware('admin.auth');

    });


    # admin.auth middleware
    Route::middleware(['admin.auth'])->group(function () {

        # category
        Route::controller(CategoryController::class)
        ->prefix('categories')->group(function () {
             Route::get('/', 'index')->name('admin.categories');
             Route::post('/store', 'store')->name('admin.categories.store');
             Route::get('/edit/{id}', 'edit')->name('admin.categories.edit');
             Route::patch('/update/{id}', 'update')->name('admin.categories.update');
             Route::delete('/delete/{id}', 'destroy')->name('admin.categories.delete');
        });

        # GET
        # POST
        # PUT
        # PATCH
        # DELETE



    });
    # subcategory
Route::controller(\App\Http\Controllers\Admin\subcategoryController::class)
->prefix('subcategories')->group(function () {
     Route::get('/', 'index')->name('admin.subcategories');
     Route::post('/store', 'store')->name('admin.subcategories.store');
     Route::get('/edit/{id}', 'edit')->name('admin.subcategories.edit');
     Route::patch('/update/{id}', 'update')->name('admin.subcategories.update');
     Route::delete('/delete/{id}', 'destroy')->name('admin.subcategories.delete');
});

#product _management

Route::controller(\App\Http\Controllers\Admin\ProductController::class)
->prefix('products')
->group(function () {
    Route::get('/', 'index')->name('admin.products');
    Route::get('/create', 'create')->name('admin.products.create');
    Route::post('/store', 'store')->name('admin.products.store');
    Route::get('/edit/{id}', 'edit')->name('admin.products.edit');
    Route::patch('/update/{id}', 'update')->name('admin.products.update');
    Route::delete('/delete/{id}', 'destroy')->name('admin.products.delete');
});
});
