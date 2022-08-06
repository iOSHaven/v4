<?php


use App\Http\Controllers\AppController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MobileConfigController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\ShortcutController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticPageController::class, 'index'])
    ->middleware('tab:Home', 'back:Home')
    ->name('landing');

/**
 * APPS - anything related to app routes
 */
Route::prefix('/apps')->middleware('tab:Apps', 'back:Apps')->group(function () {
    Route::redirect('/signednow', '/apps?type=signed&working=true', 301);
    Route::get('/{tag?}', [AppController::class, 'page'])->name('apps');
});

Route::prefix('/app')->middleware('tab:Apps', 'back:Apps')->group(function () {
    Route::post('/create', [AppController::class, 'create']);
    Route::get('/{uid}', [AppController::class, 'showAppDetailPage'])->name('detail');
    Route::get('/edit/{uid}', [AppController::class, 'edit']);
    Route::post('/update', [AppController::class, 'update']);
    Route::post('/remove', [AppController::class, 'remove']);
    Route::post('/token', [AppController::class, 'token']);
});

/**
 * MAIN - main navigational routes. The popular pages.
 */
Route::get('/games', [AppController::class, 'games'])->middleware('tab:Games', 'back:Games')->name('games');
Route::get('/jailbreaks', [AppController::class, 'jailbreaks'])->middleware('tab:Jailbreaks', 'back:Jailbreaks')->name('jailbreaks');
Route::get('/updates{tag?}', [AppController::class, 'updates'])->middleware('tab:Updates', 'back:Updates')->name('updates');
$themesPage = [StaticPageController::class, 'getThemesPage'];
Route::domain('themes.'.env('ROOT_DOMAIN'))->group(function () use ($themesPage) {
    Route::get('/', $themesPage);
});
Route::get('/skins', $themesPage);
Route::get('/themes', $themesPage);
Route::get('/itms/{id}', [AppController::class, 'itms']);
Route::get('/shortcut/perm/{id}', [ShortcutController::class, 'showPermDetail']);
Route::get('/shortcut/{itunes_id}', [ShortcutController::class, 'showDetail']);
Route::get('/shortcut/install/{itunes_id}', [ShortcutController::class, 'install']);
Route::get('/install/{itms}', [AppController::class, 'install'])->name('install');
Route::get('/download/{ipa}', [AppController::class, 'download'])->name('download');
Route::get('/install/uid/{app}', [AppController::class, 'installUid']);
Route::get('/download/uid/{app}', [AppController::class, 'downloadUid']);

/**
 * SEO - pages used for SEO and legal stuff.
 */
Route::view('/privacy', 'privacy-policy');
Route::get('/map.xml', [StaticPageController::class, 'sitemap']);

/**
 * SPECIAL - routes related to special events
 */
Route::view('/giveaway', 'giveaway');
Route::get('/generate/manifest', function (Request $request) {
    return response()->json($request->all());
})->name('manifest.generate');
Route::get('/generate/protocol', function (Request $request) {
    return Redirect::away($request->get('protocol').'://');
})->name('protocol.generate');
Route::get('/shop', function () {
    return redirect('https://memes33.com/collections/ios-haven');
});
Route::get('/merch', function () {
    return view('merch');
});
Route::get('/nordvpn', function () {
    return response()->json('Verifying NordVPN ownership 02/15/2020. Official email ioshavenco@gmail.com');
});