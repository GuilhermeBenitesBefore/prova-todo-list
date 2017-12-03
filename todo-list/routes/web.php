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

Route::get('/', 'TodoController@all');
Route::post('/add', 'TodoController@add');
Route::get('/show/{id}', 'TodoController@show');
Route::put('/update/{id}', 'TodoController@update');
Route::delete('/delete/{id}', 'TodoController@destroy');