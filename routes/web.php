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
    });
    //Routes - Todos os usuários de level:1(Revisor)
    Route::middleware(['level:1'])->group(function () {
    });
    //Routes - Todos os usuários de level:2(Admin)
    Route::middleware(['level:2'])->group(function () {
    });
});
