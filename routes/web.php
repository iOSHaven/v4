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

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], function () {

    Route::get('/', [StaticPageController::class, 'index'])->middleware('tab:Home', 'back:Home');

    /**
     * APPS - anything related to app routes
     */
    Route::prefix('apps')->middleware('tab:Apps', 'back:Apps')->group(function () {
        Route::redirect('/signednow', '/apps?type=signed&working=true', 301);
        Route::get('/{tag?}', [AppController::class, 'page'])->name('apps');
    });
    Route::prefix('app')->middleware('tab:Apps', 'back:Apps')->group(function () {
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
    Route::get('/manifest-{theme}.json', [StaticPageController::class, 'getManifest']);

    Route::get('/search', [AppController::class, 'getSearchPage'])->middleware('tab:Search', 'back:Search')->name('search');
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


    Route::get('/install', [StaticPageController::class, 'chooseInstall']);
    Route::get('/light', [StaticPageController::class, 'lightTheme']);
    Route::get('/dark', [StaticPageController::class, 'darkTheme']);
    Route::prefix('shortcuts')->middleware('tab:Shortcuts', 'back:Shortcuts')->group(function () {
        Route::get('/{tag?}', [ShortcutController::class, 'page'])->name('shortcuts');
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('blog.listing');
        Route::get('/tag/{tag}', [PostsController::class, 'showTag'])->name('blog.tag');
        Route::get('/{slug}_{post}', [PostsController::class, 'show'])->name('blog.reader');
    });
    Route::get('/news', function () {
        Log::emergency(json_encode($_SERVER));
        return redirect("https://blog.ioshaven.com");
    });
});





// Route::get('/themetest', [StaticPageController::class, 'getThemesPage']);

Route::get('/geoCountry', function () {
    return response()->json(geoCountry());
});

Route::get('/test', function () {
    return view('test');
});

//









Route::get('/avatar/{value}/{size?}', [AvatarController::class, 'api']);

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('admin');

Route::get('/tl/{view}', [StaticPageController::class, 'template']);

Route::get('/tutorials/{view}', [StaticPageController::class, 'tutorial']);

Route::get('/', [StaticPageController::class, 'index'])->middleware('tab:Home', 'back:Home');



// Route::get('/profile', [HomeController::class, 'index'])->name('profile');
// Route::post('/profile/color', [HomeController::class, 'color']);
// Route::post('/auth/toggleEditing', [HomeController::class, 'toggleEditing']);

Route::prefix('blog')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('blog.listing');
    Route::get('/tag/{tag}', [PostsController::class, 'showTag'])->name('blog.tag');
    Route::get('/{slug}_{post}', [PostsController::class, 'show'])->name('blog.reader');
});

Route::prefix('plist')->group(function () {
    Route::get('{any}', [StaticPageController::class, 'plist'])->where('any', '.*');
});
// Route::get('/plist/{name}', [StaticPageController::class, 'plist']);

Route::prefix('user')->group(function () {
    Route::get('/settings', [UserController::class, 'getSettings']);
    Route::post('/settings', [UserController::class, 'postSettings']);
    Route::get('/notifications', [UserController::class, 'getNotifications']);
    Route::get('/badges', [UserController::class, 'getBadges']);
    Route::get('/password', [UserController::class, 'getPassword']);
    Route::post('/password', [UserController::class, 'postPassword']);
});

Route::prefix('image')->group(function () {
    Route::get('/', [ImageController::class, 'index']);
});




Route::get('/tutubox/cert', [StaticPageController::class, 'tutubox']);

Route::prefix('shortcuts')->middleware('tab:Shortcuts', 'back:Shortcuts')->group(function () {
    Route::get('/{tag?}', [ShortcutController::class, 'page'])->name('shortcuts');
});

Route::get('/altstore/burrito/apps.json', [AppController::class, 'burrito']);
Route::get('/altstore/apps.json', [AppController::class, 'showAltstoreJson']);




Route::prefix('providers')->middleware('tab:Providers', 'back:Providers')->group(function () {
    Route::get('/edit', [ProviderController::class, 'edit']);
    Route::post('/update', [ProviderController::class, 'update']);
    Route::post('/destroy/{provider}', [ProviderController::class, 'destroy']);
    // Route::get('/{name}', [ProviderController::class, 'status'])
});

Route::prefix('cashier')->group(function () {
    Route::get('/setup', [CashierController::class, 'setup']);
});



Route::get('/plist', [HomeController::class, 'getPlist']);
Route::post('/plist', [HomeController::class, 'postPlist']);

Route::get('/contact/index', [ContactController::class, 'view'])->middleware('tab:Contact');
Route::get('/contact/{type}', [ContactController::class, 'view'])->middleware('back:Contact');
Route::post('/contact/{type}', [ContactController::class, 'send']);
// Route::get('/contact/{type?}', function () {
//   return abort(500, 'Sorry for the inconvenience, but this page is under maintenance.');
// });
Route::any('/site.mobileconfig', [MobileConfigController::class, 'webapp']);

Route::get('/dashboard', [StaticPageController::class, 'getDashboard'])->middleware('auth');
Route::get('/install', [StaticPageController::class, 'chooseInstall']);
Route::get('/light', [StaticPageController::class, 'lightTheme']);
Route::get('/dark', [StaticPageController::class, 'darkTheme']);
Route::post('/theme', [StaticPageController::class, 'postTheme']);
// Route::get('/test', [StaticPageController::class, 'getTestPage']);
Route::get('/search', [AppController::class, 'getSearchPage'])->middleware('tab:Search', 'back:Search')->name('search');
Route::get('/credits', [StaticPageController::class, 'getCreditsPage']);
Route::get('/faq', [StaticPageController::class, 'getFaqPage']);
Route::get('/cydia', [StaticPageController::class, 'getCydiaPage']);
Route::get('/betas', [StaticPageController::class, 'getBetasPage']);
Route::get('/jailbreak', [StaticPageController::class, 'getJailbreakPage']);
Route::get('/aboutUs', [StaticPageController::class, 'getAboutUsPage']);
Route::get('/fight-for-net-neutrality', [StaticPageController::class, 'getFightForNetNeutrality']);
// Route::get('/shortcuts', [StaticPageController::class, 'getShortcutsPage']);

Route::post('/close_announcement', [StaticPageController::class, 'closeAnnouncement']);
Route::post('/payment/add-funds/paypal', [PaymentController::class, 'payWithPaypal'])->name('paywithpaypal');
Route::get('/payment/add-funds/paypal/status', [PaymentController::class, 'getPaymentStatus'])->name('ppStatus');
Route::post('/paypal-log', [PaymentController::class, 'logPayment']);
Route::get('/skin/{uuid}', [PaymentController::class, 'downloadSkin'])->name('skin');
Route::get('/skin/affiliate/{uuid}', [PaymentController::class, 'affiliateSkin'])->name('skin.ref');

Route::post('/add/iosgods/plist', [StaticPageController::class, 'addIGPlist']);


Route::get('/home', [HomeController::class, 'index'])->name('home');
