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

Route::get('/rel', 'ReportController@index')->name('rel');
Route::get('/teste', 'ReportController@teste')->name('teste');
//Route::get('/relatorio', 'RelatorioController@geraRel')->name('relatorio');
Route::get('/relatorio', 'RelatorioController@gerarRelatorioAssociados')->name('relatorio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
