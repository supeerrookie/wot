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

Route::get('/', 'IndexController@index');

Route::get('/about/', 'IndexController@about');

Route::get('/gallery/', 'IndexController@gallery');

Route::get('/lineups/', 'IndexController@lineups');

Route::get('/schedule/', 'IndexController@schedule');

Route::get('/terms-condition/', 'IndexController@terms');

Route::get('/booklet/{file}', 'IndexController@getBooklet');

Route::prefix('promo')->group(function () {
    Route::get('/', 'IndexController@promo',function($code){

    });
    Route::get('{date}', 'IndexController@promoDate',function($code){

    });

    Route::get('/getcode/{code}', 'IndexController@getQrcode',function($code){

    });
});
    
Route::get('/schedule/{type}', 'IndexController@firstSchedule', function ($type) { 

});

Route::get('/lineups/{stage}', 'IndexController@firstLineups', function ($stage) { 

});

Route::get('/schedule/{type}/{slam}', 'IndexController@getSchedule');

Route::get('/lineups/{}', function() {
    abort(404);
});


Route::group([
    'prefix' => 'lineups', 
    'where' => [
        'stage' => 'sight|show|talks'
    ],
], function () {
    Route::get('{stage}', 'IndexController@getLineups')->where('stage', '[A-Za-z]+');
});

Route::get('/artist-detail/{slug}', 'IndexController@lineupsDetail');

Route::get('/artist-detail/', function() {
    abort(404);
});

Route::any('{catchall}', function() {
   abort(404);
})->where('catchall', '.*');

Route::fallback(function () {
    abort(404);
});