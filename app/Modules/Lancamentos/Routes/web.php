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


        Route::group(['prefix' => 'lancamentos'], function () {

            Route::get('/', 'LancamentosController@index');
            Route::get('/create', 'LancamentosController@create');
            Route::post('/store', 'LancamentosController@store');
            Route::get('/edit/{id}', 'LancamentosController@edit');
            Route::post('/update/{id}', 'LancamentosController@update');
            Route::get('/show/{id}', 'LancamentosController@show');
            Route::delete('/delete/{id}', 'LancamentosController@destroy');

        });
