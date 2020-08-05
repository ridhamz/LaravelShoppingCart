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

Route::get('/','ProductController@index');


Route::group(['middleware'=>'auth'],function(){
    
    Route::get('/add-to-cart/{id}','CheckoutController@getAddTocart');
    Route::get('/shopping-cart','CheckoutController@getShoppingCart');
    Route::get('/userpaymenthistory','CheckoutController@getallpayment');
    Route::get('/shopping-cart/checkout','CheckoutController@getCheckout');
    Route::post('/shoppingcart/checkout','CheckoutController@postCheckout');
    Route::get('/shopping-cart/reduceByOne/{id}','CheckoutController@reduceByOne');
    Route::get('/shopping-cart/reduceAll/{id}','CheckoutController@reduceAll');

    //admin routes
    Route::get('/updateproduct/{productid}','ProductController@get_add_product');
    Route::post('/postupdateproduct','ProductController@post_update_product');
    Route::post('postaddproduct','ProductController@post_add_product');
    Route::get('/deleteproduct/{productid}','ProductController@delete_product');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
