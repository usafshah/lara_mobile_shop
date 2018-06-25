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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_product', 'HomeController@add_product')->name('add_product');
Route::get('/edit_product/{id}', 'HomeController@edit_product')->name('edit_product');
Route::POST('/product_save', 'HomeController@product_save')->name('product_save');
Route::POST('/product_update', 'HomeController@product_update')->name('product_update');
Route::POST('/product_delete', 'HomeController@product_delete')->name('product_delete');
Route::get('/product', 'HomeController@product')->name('product');
Route::get('/live_search', 'HomeController@search')->name('product.search');

//Route::get('/logout', 'LogoutController@index')->name('home');
Route::get('/category', 'CatController@add')->name('category.add');
Route::get('/categories', 'CatController@all')->name('category.all');
Route::POST('/category_save', 'CatController@save')->name('category.save');
Route::POST('/cat_delete', 'CatController@delete')->name('category.delete');
Route::get('/cat_edit/{id}', 'CatController@edit')->name('category.edit');
Route::POST('/cat_update', 'CatController@update')->name('category.update');

Route::get('/search', 'SaleController@pos_search');
Route::get('/product_sale', 'SaleController@sale')->name('product.sale');
Route::POST('/invoice', 'SaleController@invoice')->name('invoice');
Route::get('/remove', 'SaleController@remove')->name('remove');

Route::get('/purchases', 'PurchaseController@home')->name('purchases');
Route::get('/record', 'PurchaseController@record')->name('Purchase.record');
