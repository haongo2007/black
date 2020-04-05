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


Route::group(['as'=> 'web'],function (){
	
	Route::get('/', 'Web\HomeController@index')->name('home');
	Route::redirect('/admin', 'admin/login');

	Route::get('/product', 'web\ProductController@index')->name('product');

	Route::get('/collection', 'web\CollectionController@index')->name('collection');

	Route::get('/cart', 'web\CartController@index')->name('cart');
});