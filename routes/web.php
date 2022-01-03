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

use App\Config;
//главная страница
Route::get('/', 'SearchController@search')->name('searchSite')->middleware('Redirect');
//плеер
//страница поиска
$modelConfig = new Config();
$prefixS = $modelConfig->forRedirect()['prefixSearch'];
$prefixSTrack = $modelConfig->forRedirect()['prefixForTrackP'];
$separator = $modelConfig->forRedirect()['separatorForSearchSP'];
$postfix = $modelConfig->forRedirect()['postfixForSearchSP'];
Route::get($prefixS . '/{query}/', 'SearchController@search')->name('searchPage')->middleware('Redirect');

//страница трека
Route::get($prefixSTrack . $separator . '{query}' . $postfix, 'SearchController@player')->name('trackPage')->middleware('Redirect');


//авторизация
Auth::routes([
    'confirm' => false,
    'forgot' => false,
    'login' => true,
    'register' => false,
    'reset' => false,
    'verification' => false,
]);

//админка
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'Redirect']], function () {
    Route::match(['get', 'post'], '/dashboard', 'AdminController@getDashboard')->name('getDashboard');
    Route::match(['get', 'post'], '/config-json', 'AdminController@getConfigJson')->name('getConfigJson');
    Route::match(['get', 'post'], '/gen-json-file', 'AdminController@genJsonConfig')->name('JsonConfig');
    Route::group(['prefix' => 'guide', 'middleware' => ['auth']], function () {
        Route::match(['get', 'post'], '/config-prefix-search', 'AdminController@getConfigGuide')->name('getConfigPrefixSearch');
        Route::match(['get', 'post'], '/config-postfix', 'AdminController@getConfigGuide')->name('getConfigPostfix');
        Route::match(['get', 'post'], '/config-prefix-track', 'AdminController@getConfigGuide')->name('getConfigPrefixTrack');
        Route::match(['get', 'post'], '/config-separator', 'AdminController@getConfigGuide')->name('getConfigSeparator');
        Route::match(['get', 'post'], '/config-header-related', 'AdminController@getConfigGuide')->name('getConfigHRelated');
        Route::match(['get', 'post'], '/config-header-track', 'AdminController@getConfigGuide')->name('getConfigHTrack');
        Route::match(['get', 'post'], '/config-header-search', 'AdminController@getConfigGuide')->name('getConfigHSearch');
    });
    Route::group(['prefix' => 'settings', 'middleware' => ['auth', 'Redirect']], function () {
        Route::match(['get', 'post'], '/config-domain', 'AdminController@getConfigJson')->name('configDomain');
        Route::match(['get', 'post'], '/config-results', 'AdminController@getConfigJson')->name('configResults');
        Route::match(['get', 'post'], '/cdn', 'AdminController@getConfigJson')->name('configCdn');
        Route::match(['get', 'post'], '/headers', 'AdminController@getConfigJson')->name('configHeaders');
        Route::match(['get', 'post'], '/system', 'AdminController@getConfigJson')->name('configSystem');
    });
    Route::group(['prefix' => 'seo', 'middleware' => ['auth', 'Redirect']], function () {
        Route::match(['get', 'post'], '/main-page', 'AdminController@getConfigJson')->name('configMainPage');
        Route::match(['get', 'post'], '/author-page', 'AdminController@getConfigJson')->name('configAuthorPage');
        Route::match(['get', 'post'], '/search-page', 'AdminController@getConfigJson')->name('configSearchPage');
        Route::match(['get', 'post'], '/new-search-page', 'AdminController@getConfigJson')->name('configNewSearchPage');
        Route::match(['get', 'post'], '/track-page', 'AdminController@getConfigJson')->name('configSeoTrackPage');
    });
});
//запись в БД id треков
Route::get('/save-tracks-id', 'FunctionController@HandlerId')->name('HandlerId')->middleware('Redirect');
Route::get('/get-info-track', 'FunctionController@TrackInBase')->name('TrackInBase')->middleware('Redirect');
Route::get('/refresh-status', 'FunctionController@refreshStatus')->name('Status')->middleware('Redirect');//убрать после отладки скрипта
