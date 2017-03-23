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

Route::group(['prefix' => 'financas'], function () {
    Route::get('/', function () {
        dd('This is the Financas module index page. Build something great!');
    });
});



        Route::group(['prefix' => 'financas'], function () {

            Route::get('/', 'FinancasController@index');
            Route::get('/create', 'FinancasController@create');
            Route::post('/store', 'FinancasController@store');
            Route::get('/edit/{id}', 'FinancasController@edit');
            Route::post('/update/{id}', 'FinancasController@update');
            Route::get('/show/{id}', 'FinancasController@show');
            Route::get('/delete/{id}', 'FinancasController@destroy');

        });

        