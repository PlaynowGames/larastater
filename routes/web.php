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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/roles', 'RoleController@index');
Route::get('/roles/create', 'RoleController@create');
Route::get('/roles/edit/{id}', 'RoleController@edit');
Route::patch('/roles/update/{id}', 'RoleController@update');
Route::post('/roles/store', 'RoleController@store');
Route::delete('/roles/delete/{id}', 'RoleController@destroy');

Route::get('/permissions', 'PermissionController@index');
Route::get('/permissions/create', 'PermissionController@create');
Route::get('/permissions/edit/{id}', 'PermissionController@edit');
Route::patch('/permissions/update/{id}', 'PermissionController@update');
Route::post('/permissions/store', 'PermissionController@store');
Route::delete('/permissions/delete/{id}', 'PermissionController@destroy');

Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::patch('/users/update/{id}', 'UserController@update');
Route::post('/users/store', 'UserController@store');
Route::delete('/users/delete/{id}', 'UserController@destroy');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
