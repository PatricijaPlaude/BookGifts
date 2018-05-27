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
Route::get('/mybooks', 'BookController@index');
Route::get('/myorders', 'OrderController@index');
Route::get('/book/{id}', 'BookController@show');
Route::get('/order/{id}', 'OrderController@show');
