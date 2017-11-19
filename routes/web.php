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

Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile');
Route::any('/auth/toggleEditing', 'HomeController@toggleEditing');
Route::any('/app/create', 'AppController@create');
Route::any('/app/update', 'AppController@update');
Route::get('/app/{uid}', 'AppController@get');
Route::get('/apps/getJson/{uid?}', 'AppController@getJson');
Route::get('/apps', 'AppController@page')->name('apps');
