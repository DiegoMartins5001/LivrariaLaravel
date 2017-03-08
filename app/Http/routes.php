<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

//$router->get('/livro/listar-autor', 'LivroController@listarAutor');

Route::get('autor/listar-autor', 'AutorController@listarAutor');
Route::get('autor/novo-autor', 'AutorController@novoAutor');
Route::get('autor/alterar-autor/{id}', 'AutorController@alterarAutor');
Route::match(['GET','POST'], 'autor/excluir-autor/{id?}', 'AutorController@excluirAutor');
Route::post('autor/salvar', 'AutorController@salvarAutor');

////////////////////////////////////////////////////////////////////

$router->get('livro/listar-livros', 'LivroController@listarLivros');

$router->get('livro/novo', 'LivroController@novo');

$router->get('livro/alterar/{id?}', 'LivroController@alterar');

$router->match(['GET','POST'], 'livro/excluir/{id?}', 'LivroController@excluir');

$router->post('livro/salvar', 'LivroController@salvar');