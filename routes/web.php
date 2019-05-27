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

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('admin/products', 'ProductController');

Route::get('admin/products','ProductController@index'); //listado
Route::get('admin/products/create','ProductController@create'); //formulario
Route::post('admin/products','ProductController@store'); //Registrar
Route::get('admin/products/{product}/edit','ProductController@edit'); //Editar
Route::post('admin/products/{product}/edit','ProductController@update'); //Actualizar

Route::get('admin/products/{product}/edit','ProductController@edit'); //Editar




