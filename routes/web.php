<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{view?}', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin-index');


Route::group(['prefix'=>'products'],function(){
    Route::get('/create-product',[\App\Http\Controllers\ProductController::class,'createProduct'])->name('create-product');
    Route::post('/create-product-post',[\App\Http\Controllers\ProductController::class,'createProductPost'])->name('create-product-post');
    Route::get('/update-product/{idproduct}',[\App\Http\Controllers\ProductController::class,'updateProduct'])->name('update-product');
    Route::post('/update-product-post',[\App\Http\Controllers\ProductController::class,'updateProductPost'])->name('update-product-post');
    Route::get('/get-products',[\App\Http\Controllers\ProductController::class,'getProducts'])->name('get-products');
    Route::get('/list-products',[\App\Http\Controllers\ProductController::class,'products'])->name('product-list');
    Route::get('/list-stocks/{idproduct}',[\App\Http\Controllers\ProductController::class,'listStocks'])->name('stocks-list');
    Route::get('/delete-product/{idproduct}',[\App\Http\Controllers\ProductController::class,'deleteProduct'])->name('product-delete');

    Route::get('/delete-stock/{id}',[\App\Http\Controllers\ProductController::class,'deleteStock'])->name('stock-delete');
    Route::get('/create-stock/{idproduct}',[\App\Http\Controllers\ProductController::class,'createStock'])->name('create-stock');
    Route::post('/create-stock-post',[\App\Http\Controllers\ProductController::class,'createStockPost'])->name('create-stock-post');
    Route::get('/update-stock/{id}',[\App\Http\Controllers\ProductController::class,'updateStock'])->name('update-stock');
    Route::post('/update-stock-post',[\App\Http\Controllers\ProductController::class,'updateStockPost'])->name('update-stock-post');
});

Route::group(['prefix'=>'warehouses'],function(){
    Route::get('/get-warehouses',[\App\Http\Controllers\WarehouseController::class,'getWarehouses'])->name('get-warehouses');
    Route::get('/',[\App\Http\Controllers\WarehouseController::class,'warehouses'])->name('warehouse-list');


});

Route::group(['prefix'=>'orders'],function(){
    Route::get('/get-orders',[\App\Http\Controllers\OrderController::class,'getOrders'])->name('get-orders');
    Route::get('/',[\App\Http\Controllers\OrderController::class,'orders'])->name('order-list');

});


Route::group(['prefix'=>'suppliers'],function(){
    Route::get('/get-suppliers',[\App\Http\Controllers\SupplierController::class,'getSuppliers'])->name('get-suppliers');
    Route::get('/',[\App\Http\Controllers\SupplierController::class,'suppliers'])->name('suppliers-list');

});


Route::group(['prefix'=>'vatgroups'],function(){
    Route::get('/get-vatgroups',[\App\Http\Controllers\VatGroupController::class,'getVatgroups'])->name('get-vatgroups');
    Route::get('/',[\App\Http\Controllers\VatGroupController::class,'vatgroups'])->name('vatgroups-list');

});