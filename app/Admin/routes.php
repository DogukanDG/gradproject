<?php
use Illuminate\Routing\Router;
use Encore\Admin\Facades\Admin;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\ListingController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
    //$router->resource('listings', ListingController::class);
    // $router->resource('job-seeker-listings', JobSeekerController::class);
    $router->resource('listings', ListingController::class);
    $router->resource('job-seeker-listings', JobSeekerListingController::class);
    //$router->resource('offers', OffersController::class);
    //$router->resource('applications', ApplicationController::class);
    $router->resource('offers', OffersController::class);
    $router->resource('applications', ApplicationsController::class);
});