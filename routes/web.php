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

Route::get('/',function (){return view('welcome');});


Route::get('/Todo', 'TodoController@getAll');
Route::get('/Todo/{id}', 'TodoController@getById')->where('id', '[0-9]+');
Route::get('/Todo/delete/{id}', 'TodoController@delete')->where('id', '[0-9]+');
Route::post('/Todo/cadastrado', 'TodoController@postToDo');
Route::get('/Todo/new', 'TodoController@newTodo');
Route::get('Todo/edit/{id}','TodoController@put');


