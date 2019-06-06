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

Route::get('/', function () {
    return redirect('/home');
})->name('home');

Route::resource('clients', 'ClientController');


Route::resource('product_incomes', 'ProdInController');
Route::get('product_incomes/getbycategory/{id}', 'ProdInController@getbycategory');



Route::resource('products', 'ProductController');
Route::get('products/{id}/getcategory', 'ProductController@getCategory');
Route::get('products/{id}/ajaxedit', 'ProductController@ajaxedit');


Route::resource('categories', 'CategoryController');
Route::get('categories/{id}/ajaxedit', 'CategoryController@ajaxedit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
