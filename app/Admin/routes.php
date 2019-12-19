<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    
    $router->resource('/lineups', LineupsController::class);
    $router->resource('/page', PageController::class);
    $router->resource('/content', MediaController::class);
    $router->resource('/faq', FaqController::class);
    $router->resource('/gallery', GalleryController::class);
    $router->resource('/schedule', ScheduleController::class);
    $router->resource('/promo', PromoController::class);
    $router->resource('/page-content', PageContentController::class);

    $router->get("/api/getlineups", "LineupsController@getLineups");


});
