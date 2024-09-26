<?php

use App\Http\Controllers\Admin\ActivationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\IndexController;
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


    //activation 
    Route::get('/add-activation', [ActivationController::class, 'addactivation'])->name('admin.addactivation');
    Route::post('/store-activation', [ActivationController::class, 'storeactivation'])->name('admin.storeactivation');
    Route::get('/activations-list', [ActivationController::class, 'listactivation'])->name('admin.listactivation');
    Route::post('activations/status', [ActivationController::class, 'activationstatus'])->name('admin.activationstatus');
    Route::get('/activations-edit/{id}', [ActivationController::class, 'editactivation'])->name('admin.editactivation');
    Route::get('/delete-activations/{id}', [ActivationController::class, 'deleteactivation'])->name('admin.deleteactivation');
    Route::post('/update-activations/{id}', [ActivationController::class, 'updateactivation'])->name('admin.updateactivation');

    //Courier types
    Route::get('/add-couriertype', [CourierController::class, 'addcouriertype'])->name('admin.addcouriertype');
    Route::post('/store-couriertype', [CourierController::class, 'storecouriertype'])->name('admin.storecouriertype');
    Route::get('/couriertypes-list', [CourierController::class, 'listcouriertype'])->name('admin.listcouriertype');
    Route::post('couriertypes/status', [CourierController::class, 'couriertypestatus'])->name('admin.couriertypestatus');
    Route::get('/couriertypes-edit/{id}', [CourierController::class, 'editcouriertype'])->name('admin.editcouriertype');
    Route::get('/delete-couriertypes/{id}', [CourierController::class, 'deletecouriertype'])->name('admin.deletecouriertype');
    Route::post('/update-couriertypes/{id}', [CourierController::class, 'updatecouriertype'])->name('admin.updatecouriertype');

});
Route::get('/index', [IndexController::class, 'index'])->name('user.index');
Route::get('/category-products/{id}', [IndexController::class, 'categorywiseproduct'])->name('user.categorywiseproduct');
Route::get('/products-details/{prodid}', [IndexController::class, 'productdetails'])->name('user.productdetails');



// Include authentication routes
require __DIR__.'/auth.php';
