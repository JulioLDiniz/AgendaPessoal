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

Route::get('/', 'TarefaController@listar');

Route::post('cadastrar-tarefa', 'TarefaController@cadastrar');

Route::post('excluir-tarefa','TarefaController@excluir');

Route::post('alterar-tarefa','TarefaController@alterar');
Route::post('mail','TarefaController@mail');

