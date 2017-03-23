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

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', function () {
        dd('This is the Blog module index page. Build something great!');
    });
});



        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        


        Route::group(['prefix' => 'blog'], function () {

            Route::get('/', 'BlogController@index');
            Route::get('/create', 'BlogController@create');
            Route::post('/store', 'BlogController@store');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update/{id}', 'BlogController@update');
            Route::get('/show/{id}', 'BlogController@show');
            Route::get('/delete/{id}', 'BlogController@destroy');

        });

        