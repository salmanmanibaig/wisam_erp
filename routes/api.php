<?php

use App\Http\Controllers\CustomerPaymentReportsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
route::get('products','product\ProductController@index');
route::post('/products_store','product\ProductController@store');
route::get('products/destroy/{id}','product\ProductController@destroy');
route::get('products/create','product\ProductController@create');
route::get('products/edit/{id}','product\ProductController@edit');
route::get('products/view/{id}','product\ProductController@show');
route::put('products/update/{id}','product\ProductController@update');
