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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin-index');


Route::group(['prefix'=>'products'],function(){
    Route::get('/get-products',[\App\Http\Controllers\ProductController::class,'getProducts'])->name('get-products');
    Route::get('/',[\App\Http\Controllers\ProductController::class,'products'])->name('product-list');
    // Route::get('/admins-json','AdminController@adminsJson')->name('admins-json');



});

Route::group(['prefix'=>'warehouses'],function(){
    Route::get('/get-warehouses',[\App\Http\Controllers\WarehouseController::class,'getWarehouses'])->name('get-warehouses');
    Route::get('/',[\App\Http\Controllers\WarehouseController::class,'warehouses'])->name('warehouse-list');
    // Route::get('/admins-json','AdminController@adminsJson')->name('admins-json');

});

Route::group(['prefix'=>'orders'],function(){
    Route::get('/get-orders',[\App\Http\Controllers\OrderController::class,'getOrders'])->name('get-orders');
    Route::get('/',[\App\Http\Controllers\OrderController::class,'orders'])->name('order-list');
    // Route::get('/admins-json','AdminController@adminsJson')->name('admins-json');



});