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

Route::prefix('todo')->group(function () {

    Route::resource('tarefas', 'TarefasController');
    Route::resource('categorias', 'CategoriasController');

    Route::get('/tarefas/delete/{id}', 'TarefasController@delete');
    Route::get('/categorias/delete/{id}', 'CategoriasController@delete');

});
