<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Este arquivo conterá todas as informações e rotas do sistema
| Depois de logado o usuario permanecerá dentro do diretorio /internetbank
|
*/

Route::group(['prefix' => 'internetbanking'], function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::post('/logar', 'Auth\LoginController@authenticate')->name('autenticar');

    Route::get('/transferencia', 'ContaController@transferenciaView')->name('transferenciaView');

});

