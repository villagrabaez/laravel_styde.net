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

Route::get('/', 'UserController@index');

Route::get('/users', 'UserController@index')
    ->name('users.index');

Route::get('/users/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/users/nuevo', 'UserController@create')->name('users.create');

Route::get('/users/{user}/editar', 'UserController@edit')
    ->where('user', '[0-9]+')
    ->name('users.edit');

Route::put('/users/{user}', 'UserController@update');

Route::post('/users/crear', 'UserController@store');

Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
