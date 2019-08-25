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

Route::get('/', 'TestController@index');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('products/{product}','ProductController@show'); //Ver
Route::get('categories/{category}','CategoryController@show'); //Ver

Route::get('/{search}','SearchController@show'); //Ver

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

//Route::resource('admin/products', 'ProductController');
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('products','ProductController@index'); //listado
	Route::get('products/create','ProductController@create'); //formulario
	Route::post('products','ProductController@store'); //Registrar
	Route::get('products/{product}','ProductController@show'); //Ver
	Route::get('products/{product}/edit','ProductController@edit'); //Editar
	Route::post('products/{product}/edit','ProductController@update'); //Actualizar
	Route::post('products/{product}/delete','ProductController@destroy'); //Eliminar

	Route::get('products/{product}/images','ImageController@index'); //listado
	Route::post('products/{product}/images','ImageController@store'); //Registrar
	Route::delete('products/{product}/images','ImageController@destroy'); //Eliminar
	Route::get('products/{product}/images/select/{image}','ImageController@select'); //Favorito

	Route::get('categories','CategoryController@index'); //listado
	Route::get('categories/create','CategoryController@create'); //formulario
	Route::post('categories','CategoryController@store'); //Registrar
	Route::get('categories/{category}','CategoryController@show'); //Ver
	Route::get('categories/{category}/edit','CategoryController@edit'); //Editar
	Route::post('categories/{category}/edit','CategoryController@update'); //Actualizar
	Route::post('categories/{category}/delete','CategoryController@destroy'); //Eliminar
});





