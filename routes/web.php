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
Route::post('/profile/color', 'HomeController@color');
Route::post('/auth/toggleEditing', 'HomeController@toggleEditing');

Route::get('/plist/{name}', function ($name) {
  header('Location: ' . "itms-services://?action=download-manifest&url=" . urlencode(url("/plist/$name.plist")));
  exit;
  // exit;
  // return redirect()->to("itms-services://?action=download-manifest&url=" . url('/pokego2.plist'))->send();
  // return redirect()
});

Route::post('/app/create', 'AppController@create');
Route::get('/app/{uid}', 'AppController@get');
Route::post('/app/update', 'AppController@update');
Route::post('/app/remove', 'AppController@remove');

Route::get('/install/{uid}', 'AppController@install');
Route::get('/download/{uid}', 'AppController@download');

Route::get('/apps/getJson/{uid?}', 'AppController@getJson');
Route::get('/apps/{tag?}', 'AppController@page')->name('apps');
Route::get('/updates{tag?}', 'AppController@updates');

Route::get('/plist', 'HomeController@getPlist');
Route::post('/plist', 'HomeController@postPlist');

Route::get('/contact/{type}', 'ContactController@view');
Route::post('/contact', 'ContactController@send');

Route::get('/credits', 'StaticPageController@getCreditsPage');
Route::get('/faq', 'StaticPageController@getFaqPage');
Route::get('/cydia', 'StaticPageController@getCydiaPage');
Route::get('/betas', 'StaticPageController@getBetasPage');
Route::get('/jailbreak', 'StaticPageController@getJailbreakPage');
Route::get('/aboutUs', 'StaticPageController@getAboutUsPage');
Route::get('/fight-for-net-neutrality', 'StaticPageController@getFightForNetNeutrality');

Route::post('/close_announcement', 'StaticPageController@closeAnnouncement');

Route::get('/test', function () {
  return view('layouts/footer');
});
