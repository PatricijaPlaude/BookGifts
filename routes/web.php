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

Route::get('/genres', 'GenreController@index');
Route::get('/genre/add', 'GenreController@create');

Route::get('/mybooks', 'BookController@index');
Route::get('/book/add', 'BookController@create');
Route::get('/book/{id}', 'BookController@show');
Route::get('/book/remove/{id}', 'BookController@destroy');

Route::get('/myorders', 'OrderController@index');
Route::get('/order/add/{id}', 'OrderController@create');
Route::get('/order/{id}', 'OrderController@show');

Route::resource('book', 'BookController');
Route::resource('genre', 'GenreController');
