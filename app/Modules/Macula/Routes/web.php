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

Route::group(['prefix' => 'macula'], function () {
    Route::get('/', function () {
        dd('This is the Macula module index page. Build something great!');
    });
});



        Route::group(['prefix' => 'macula'], function () {

            Route::get('/', 'MaculaController@index');
            Route::get('/create', 'MaculaController@create');
            Route::post('/store', 'MaculaController@store');
            Route::get('/edit/{id}', 'MaculaController@edit');
            Route::patch('/update/{id}', 'MaculaController@update');
            Route::get('/show/{id}', 'MaculaController@show');
            Route::delete('/delete/{id}', 'MaculaController@destroy');

        });

        