<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'relatorios'], function () {
    Route::get('/', function () {
        dd('This is the Relatorios module index page. Build something great!');
    });
});



        Route::group(['prefix' => 'relatorios'], function () {

            Route::get('/', 'RelatoriosController@index');
            Route::get('/create', 'RelatoriosController@create');
            Route::post('/store', 'RelatoriosController@store');
            Route::get('/edit/{id}', 'RelatoriosController@edit');
            Route::patch('/update/{id}', 'RelatoriosController@update');
            Route::get('/show/{id}', 'RelatoriosController@show');
            Route::delete('/delete/{id}', 'RelatoriosController@destroy');

        });
