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
Route::post('/auth/toggleEditing', 'HomeController@toggleEditing');

Route::post('/app/create', 'AppController@create');
Route::get('/app/{uid}', 'AppController@get');
Route::post('/app/update', 'AppController@update');
Route::post('/app/remove', 'AppController@remove');

Route::get('/install/{uid}', 'AppController@install');
Route::get('/download/{uid}', 'AppController@download');

Route::get('/apps/getJson/{uid?}', 'AppController@getJson');
Route::get('/apps', 'AppController@page')->name('apps');

Route::get('/test', function () {
  return view('layouts.footer');
});
