<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Group routes under 'admin' prefix and 'auth' middleware
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    
    // Admin dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Profile routes
    // Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

    //category
    Route::get('/add-category', [CategoryController::class, 'addcat'])->name('admin.addcat');
    Route::post('/store-category', [CategoryController::class, 'storecat'])->name('admin.storecat');
    Route::get('/category-list', [CategoryController::class, 'listcat'])->name('admin.listcat');
    Route::get('/category-edit/{id}', [CategoryController::class, 'editcat'])->name('admin.editcat');
    Route::post('/update-categor/{id}', [CategoryController::class, 'updatecat'])->name('admin.updatecat');
    Route::delete('/delete-categor/{id}', [CategoryController::class, 'deletecat'])->name('admin.deleteecat');
    Route::post('admin/toggleOnTop', [CategoryController::class, 'toggleOnTop'])->name('admin.toggleOnTop');
    Route::post('admin/toggleOnFooter', [CategoryController::class, 'toggleOnFooter'])->name('admin.toggleOnFooter');
    Route::post('admin/toggleOnStatus', [CategoryController::class, 'toggleOnStatus'])->name('admin.toggleOnStatus');


    //subcategory
    route::get('/list-subcat',[SubCategoryController::class,'listsubcat'])->name('admin.listsubcat');
    route::get('/add-subcat',[SubCategoryController::class,'addsubcat'])->name('admin.addsubcat');
    Route::post('/store-subcat', [SubCategoryController::class, 'storesubcat'])->name('admin.storesubcat');
    Route::get('/edit-subcat/{id}', [SubCategoryController::class, 'editSubcat'])->name('admin.editSubcat');
    Route::post('/update-subcat/{id}', [SubCategoryController::class, 'updateSubcat'])->name('admin.updateSubcat');
    Route::delete('/delete-subcat/{id}', [SubCategoryController::class, 'deletesubcat'])->name('admin.deletesubcat');    
    Route::post('admin/subcategoryOnTop', [SubCategoryController::class, 'subcategoryOnTop'])->name('admin.subcategoryOnTop');
    Route::post('admin/subcategoryOnFooter', [SubCategoryController::class, 'subcategoryOnFooter'])->name('admin.subcategoryOnFooter');
    Route::post('admin/subcategoryStatus', [SubCategoryController::class, 'subcategoryStatus'])->name('admin.subcategoryStatus');
    
    //Products
    Route::get('/add-product', [ProductController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('/store-product', [ProductController::class, 'storeproduct'])->name('admin.storeproduct');
    Route::get('/products-list', [ProductController::class, 'listproduct'])->name('admin.listproduct');
    Route::delete('/delete-product/{id}', [ProductController::class, 'deleteproduct'])->name('admin.deleteproduct');
    Route::post('admin/productOnTop', [ProductController::class, 'productOnTop'])->name('admin.productOnTop');
    Route::post('admin/productOnStatus', [ProductController::class, 'productOnStatus'])->name('admin.productOnStatus');
    Route::post('admin/getSubCategory', [ProductController::class, 'getSubCategory'])->name('admin.getSubCategory');

});

// Include authentication routes
require __DIR__.'/auth.php';
