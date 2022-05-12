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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {

    route::get('vendor-purchase-orders/view_detail/{id}','VendorPurchase\VendorPurchaseOrderController@view');
    route::get('vendor-purchase-orders/complete_po/{id}','VendorPurchase\VendorPurchaseOrderController@complete');
    Route::resource('bank-account', 'SmBankAccountController');

    Voyager::routes();





});
