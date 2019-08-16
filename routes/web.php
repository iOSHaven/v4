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

// Route::get('/test', function () {
//   return view('test');
// });
Route::get("/avatar/{value}/{size?}", "AvatarController@api");

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware("admin");

Route::get('/tl/{view}', 'StaticPageController@template');

Route::get('/tutorials/{view}', 'StaticPageController@tutorial');

Route::get('/', 'StaticPageController@index');

Auth::routes();

// Route::get('/profile', 'HomeController@index')->name('profile');
// Route::post('/profile/color', 'HomeController@color');
// Route::post('/auth/toggleEditing', 'HomeController@toggleEditing');

Route::get('/plist/{name}', "StaticPageController@plist");


Route::group(['prefix' => 'user'], function () {
    Route::get("/settings", "UserController@getSettings");
    Route::post("/settings", "UserController@postSettings");
    Route::get("/notifications", "UserController@getNotifications");
    Route::get("/badges", "UserController@getBadges");
    Route::get("/password", "UserController@getPassword");
    Route::post("/password", "UserController@postPassword");
});

Route::group(['prefix' => 'image'], function () {
  Route::get('/', 'ImageController@index');
  // Route::get('all', 'RosterController@all');
  // Route::get('creators', 'RosterController@creators');
  // Route::get('streamers', 'RosterController@streamers');
  // Route::get('team/{team}', 'RosterController@teams');
});

// Route::post('putlinks', function (\Request $r) {
//   return response()->json(["hello"]);
// });

Route::get('/itms/{id}', 'AppController@itms');


Route::post('/app/create', 'AppController@create');
Route::get('/app/{uid}', 'AppController@get');
Route::get('/app/edit/{uid}', 'AppController@edit');
Route::post('/app/update', 'AppController@update');
Route::post('/app/remove', 'AppController@remove');

Route::get('/install/{uid}', 'AppController@install');
Route::get('/download/{uid}', 'AppController@download');

Route::group(["prefix" => "apps", "middleware" => ["tab:Apps", "back:Apps"]], function () {
  Route::get('/getJson/{uid?}', 'AppController@getJson');
  Route::get('/type/{type}', 'AppController@type');
  Route::get('/{tag?}', 'AppController@page')->name('apps');
});

Route::get('/games', 'AppController@games')->middleware('tab:Games', 'back:Games');
Route::get('/jailbreaks', 'AppController@jailbreaks')->middleware('tab:Jailbreaks', 'back:Jailbreaks');
Route::get('/updates{tag?}', 'AppController@updates')->middleware('tab:Updates', 'back:Updates');

Route::get('/plist', 'HomeController@getPlist');
Route::post('/plist', 'HomeController@postPlist');

Route::get('/contact/{type}', 'ContactController@view');
Route::post('/contact/{type}', 'ContactController@send');
// Route::get('/contact/{type?}', function () {
//   return abort(500, 'Sorry for the inconvenience, but this page is under maintenance.');
// });

Route::post("/theme", "StaticPageController@postTheme");
Route::get('/test', 'StaticPageController@getTestPage');
Route::get('/search', 'StaticPageController@getSearchPage')->middleware('tab:Search', 'back:Search');
Route::get('/credits', 'StaticPageController@getCreditsPage');
Route::get('/faq', 'StaticPageController@getFaqPage');
Route::get('/cydia', 'StaticPageController@getCydiaPage');
Route::get('/betas', 'StaticPageController@getBetasPage');
Route::get('/jailbreak', 'StaticPageController@getJailbreakPage');
Route::get('/aboutUs', 'StaticPageController@getAboutUsPage');
Route::get('/fight-for-net-neutrality', 'StaticPageController@getFightForNetNeutrality');

Route::post('/close_announcement', 'StaticPageController@closeAnnouncement');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
