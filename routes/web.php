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

use App\Shortcut;

Route::get("/map.xml", function() {
        $contents = View::make('sitemap')
        ->with(["apps" => \App\App::get(), "shortcuts" => Shortcut::get()]);
        return response($contents)->withHeaders([
          'Content-Type' => 'text/xml'
        ]);
});

Route::get("/shop", function() {
  return redirect("https://memes33.com/collections/ios-haven");
});

Route::get("/merch", function() {
  return view('merch');
});

Route::get("/nordvpn", function () {
  return response()->json("Verifying NordVPN ownership 02/15/2020. Official email ioshavenco@gmail.com");
});

Route::get("/avatar/{value}/{size?}", "AvatarController@api");

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware("admin");

Route::get('/tl/{view}', 'StaticPageController@template');

Route::get('/tutorials/{view}', 'StaticPageController@tutorial');

Route::get('/', 'StaticPageController@index')->middleware('tab:Home', 'back:Home');

Auth::routes();

// Route::get('/profile', 'HomeController@index')->name('profile');
// Route::post('/profile/color', 'HomeController@color');
// Route::post('/auth/toggleEditing', 'HomeController@toggleEditing');

Route::group(['prefix' => 'plist'], function () {
  Route::get('{any}',"StaticPageController@plist")->where('any', '.*');
});
// Route::get('/plist/{name}', "StaticPageController@plist");


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
Route::get('/app/{uid}', 'AppController@showAppDetailPage');
Route::get('/shortcut/{itunes_id}', 'ShortcutController@showDetail');
Route::get('/shortcut/install/{itunes_id}', 'ShortcutController@install');
Route::get('/app/edit/{uid}', 'AppController@edit');
Route::post('/app/update', 'AppController@update');
Route::post('/app/remove', 'AppController@remove');
Route::post('/app/token', 'AppController@token');

Route::get('/install/{itms}', 'AppController@install')->name('install');
Route::get('/download/{ipa}', 'AppController@download')->name('download');
Route::get('/install/uid/{app}', 'AppController@installUid');
Route::get('/download/uid/{app}', 'AppController@downloadUid');


Route::group(["prefix" => "shortcuts", "middleware" => ["tab:Shortcuts", "back:Shortcuts"]], function () {
  Route::get('/{tag?}', 'ShortcutController@page')->name('shortcuts');
});

Route::get('/altstore/burrito/apps.json', 'AppController@burrito');
Route::get('/altstore/apps.json', 'AppController@showAltstoreJson');

Route::group(["prefix" => "apps", "middleware" => ["tab:Apps", "back:Apps"]], function () {
  Route::redirect('/signednow', '/apps?type=signed&working=true', 301);
  Route::get('/{tag?}', 'AppController@page')->name('apps');
});

Route::group(["prefix" => "providers", "middleware" => ["tab:Providers", "back:Providers"]], function () {
  Route::get("/edit", "ProviderController@edit");
  Route::post("/update", "ProviderController@update");
  Route::post("/destroy/{provider}", "ProviderController@destroy");
});


Route::group(["prefix" => "cashier"], function () {
  Route::get("/setup", "CashierController@setup");
});




Route::get('/games', 'AppController@games')->middleware('tab:Games', 'back:Games')->name('games');
Route::get('/jailbreaks', 'AppController@jailbreaks')->middleware('tab:Jailbreaks', 'back:Jailbreaks')->name('jailbreaks');
Route::get('/updates{tag?}', 'AppController@updates')->middleware('tab:Updates', 'back:Updates')->name('updates');

Route::get('/plist', 'HomeController@getPlist');
Route::post('/plist', 'HomeController@postPlist');

Route::get('/contact/index', 'ContactController@view')->middleware('tab:Contact');
Route::get('/contact/{type}', 'ContactController@view')->middleware('back:Contact');
Route::post('/contact/{type}', 'ContactController@send');
// Route::get('/contact/{type?}', function () {
//   return abort(500, 'Sorry for the inconvenience, but this page is under maintenance.');
// });
Route::any('/site.mobileconfig', "MobileConfigController@webapp");


Route::get('/dashboard', 'StaticPageController@getDashboard')->middleware('auth');
Route::get("/install", "StaticPageController@chooseInstall");
Route::get("/light", "StaticPageController@lightTheme");
Route::get("/dark", "StaticPageController@darkTheme");
Route::post("/theme", "StaticPageController@postTheme");
Route::get('/test', 'StaticPageController@getTestPage');
Route::get('/search', 'AppController@getSearchPage')->middleware('tab:Search', 'back:Search');
Route::get('/credits', 'StaticPageController@getCreditsPage');
Route::get('/faq', 'StaticPageController@getFaqPage');
Route::get('/cydia', 'StaticPageController@getCydiaPage');
Route::get('/betas', 'StaticPageController@getBetasPage');
Route::get('/skins', 'StaticPageController@getSkinsPage');
Route::get('/jailbreak', 'StaticPageController@getJailbreakPage');
Route::get('/aboutUs', 'StaticPageController@getAboutUsPage');
Route::get('/fight-for-net-neutrality', 'StaticPageController@getFightForNetNeutrality');
// Route::get('/shortcuts', 'StaticPageController@getShortcutsPage');

Route::post('/close_announcement', 'StaticPageController@closeAnnouncement');
Route::post('/payment/add-funds/paypal', 'PaymentController@payWithPaypal')->name('paywithpaypal');
Route::get('/payment/add-funds/paypal/status', 'PaymentController@getPaymentStatus')->name('ppStatus');
Route::post('/paypal-log', 'PaymentController@logPayment')->middleware('auth');
Route::get('/skin/{uuid}', 'PaymentController@downloadSkin')->name('skin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
