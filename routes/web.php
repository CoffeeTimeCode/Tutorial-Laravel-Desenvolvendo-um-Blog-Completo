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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->prefix('painel')->group(function () {
    Route::get('/','Usuarios\PainelController@index');

    //Routes - Todos os usuários de level:0(Leitor)
    Route::middleware(['level:0'])->group(function () {
      Route::get('/configuracoes','Usuarios\UserController@config');
      Route::post('/configuracoes','Usuarios\UserController@config_update');
    });
    //Routes - Todos os usuários de level:1(Revisor)
    Route::middleware(['level:1'])->group(function () {
      Route::get('/categorias','Usuarios\CategoriasController@index');
      Route::get('/tags','Usuarios\TagsController@index');

    });
    //Routes - Todos os usuários de level:2(Admin)
    Route::middleware(['level:2'])->group(function () {
      Route::get('/criar-usuario','Usuarios\UserController@create');
      Route::post('/criar-usuario','Usuarios\UserController@store');

      Route::get('/listar-usuarios/{filtro?}','Usuarios\UserController@index');

      Route::get('/deletar-usuario/{id}','Usuarios\UserController@destroy');

      Route::post('/categorias','Usuarios\CategoriasController@store');
      Route::post('/categorias/editar','Usuarios\CategoriasController@update');
      Route::get('/categorias/deletar/{id}','Usuarios\CategoriasController@destroy');

      Route::post('/tags','Usuarios\TagsController@store');
      Route::post('/tags/editar','Usuarios\TagsController@update');
      Route::get('/tags/deletar/{id}','Usuarios\TagsController@destroy');

      Route::get('/upload-arquivos', 'Usuarios\ArquivosController@index');
      Route::post('/upload-arquivos', 'Usuarios\ArquivosController@store');
    });
});
