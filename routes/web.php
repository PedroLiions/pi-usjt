<?php

Route::get('/', function () {
    return redirect('internetbanking');
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

    Route::post('/logar', 'Auth\LoginController@authenticate')->name('autenticar');

    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'transferencia'], function() {

        Route::get('', 'TransferenciaController@create')->name('TransferenciaCreate');

        Route::post('/store', 'TransferenciaController@store')->name('TransferenciaStore');

    });

    Route::group(['prefix' => 'extrato'], function() {

        Route::get('/', 'ExtratoController@extratos')->name('ExtratoIndex');

    });

    Route::group(['prefix' => 'pagamento'], function() {

        Route::get('/', 'PagamentoController@create');

    });

});

