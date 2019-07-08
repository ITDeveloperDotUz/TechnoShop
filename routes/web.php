<?php

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

use Illuminate\Http\Request;


Auth::routes();
Route::group(['middleware' => ['auth']], function(){


    Route::get('/', function () {
        return redirect('/home');
    })->name('home');
    Route::get('/home', 'HomeController@index')->name('home');



// Clients
    Route::resource('clients', 'ClientController');

//Product Incomes
    Route::resource('product_incomes', 'ProdInController');
    Route::get('product_incomes/getbycategory/{id}', 'ProdInController@getbycategory');


// Products
    Route::resource('products', 'ProductController');
    Route::get('products/{id}/getcategory', 'ProductController@getCategory');
    Route::get('products/{id}/ajaxedit', 'ProductController@ajaxedit');

// Catigories
    Route::resource('categories', 'CategoryController');
    Route::get('categories/{id}/ajaxedit', 'CategoryController@ajaxedit');

// Orders
    Route::resource('orders', 'OrderController');
    Route::get('orders/{id}/getdata', 'OrderController@getdata');


});

