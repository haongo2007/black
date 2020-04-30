<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['as'=> 'admin.'],function (){

	Route::group(['middleware' => 'web'],function (){
		Auth::routes();
	});

	Route::group(['middleware' => 'auth'],function (){

		Route::redirect('/', 'admin/home');

		Route::get('/home', 'Admin\HomeController@index')->name('home');
		/* page */
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'Admin\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'Admin\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'Admin\PageController@notifications']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'Admin\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'Admin\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'Admin\PageController@upgrade']);
		/* profile */
		Route::get('profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);
		Route::put('profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);
		Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);
		/* brand */
		Route::resource('brand', 'Admin\BrandController', ['except' => ['show']])->middleware('page:Brands');
		/* categories */
		Route::resource('categories', 'Admin\CategoriesController', ['except' => ['show']])->middleware('page:Categories');
		/* product */
		Route::resource('products', 'Admin\ProductController');
		/* super admin admin */
		Route::group(['middleware' => 'role:Admin'],function (){	
			/* users */
			Route::resource('user', 'Admin\UserController', ['except' => ['show']]);
			/* role */
			Route::resource('roles', 'Admin\RolesController');
			/* permission */
			Route::resource('permissions', 'Admin\PermissionsController');
		});
		Route::get('procesimage', ['as' => 'procesImage', 'uses' => 'ResizeImageController@ResizeImage']);
		
	});
});