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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/lang/{id}','LangController@update');
Route::get('/users', 'UserController@index');
Route::get('/user/update/{id}', 'UserController@update');
Route::get('/genres', 'GenreController@index');
Route::get('/genre/add', 'GenreController@create');
Route::get('/mybooks', 'BookController@index');
Route::get('/book/add', 'BookController@create');
Route::get('/book/remove/{id}', 'BookController@destroy');
Route::get('/book/{id}', 'BookController@show');
Route::get('/myorders', 'OrderController@index');
Route::get('/order/add/{id}', 'OrderController@create');
Route::get('/order/remove/{id}', 'OrderController@destroy');
Route::get('/order/update/{id}', 'OrderController@update');
Route::get('/order/{id}', 'OrderController@show');
Route::resource('book', 'BookController');
Route::resource('genre', 'GenreController');
Route::resource('order', 'OrderController');
Route::resource('user', 'UserController');
