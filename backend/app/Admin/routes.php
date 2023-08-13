<?php

use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    Route::prefix('materials')->group(function () use ($router) {
        $router->get('/', 'MaterialController@index')->name('materials');
        $router->get('/create', 'MaterialController@create')->name('materials-create');
        $router->get('/{id}/edit', 'MaterialController@edit')->name('materials-edit');
        $router->post('/', 'MaterialController@store')->name('materials-store');
        $router->put('/{id}', 'MaterialController@update')->name('materials-update');
    });

    Route::prefix('coefficients')->group(function () use ($router) {
        $router->get('/', 'CoefficientController@index')->name('coefficients');
        $router->get('/create', 'CoefficientController@create')->name('coefficients-create');
        $router->get('/{id}/edit', 'CoefficientController@edit')->name('coefficients-edit');
        $router->post('/', 'CoefficientController@store')->name('coefficients-store');
        $router->put('/{id}', 'CoefficientController@update')->name('coefficients-update');
    });

    Route::prefix('extra-works')->group(function () use ($router) {
        $router->get('/', 'ExtraWorkController@index')->name('extra-works');
        $router->get('/create', 'ExtraWorkController@create')->name('extra-works-create');
        $router->get('/{id}/edit', 'ExtraWorkController@edit')->name('extra-works-edit');
        $router->post('/', 'ExtraWorkController@store')->name('extra-works-store');
        $router->put('/{id}', 'ExtraWorkController@update')->name('extra-works-update');
    });

    Route::prefix('crowns')->group(function () use ($router) {
        $router->get('/', 'CrownController@index')->name('crowns');
        $router->get('/create', 'CrownController@create')->name('crowns-create');
        $router->get('/{id}/edit', 'CrownController@edit')->name('crowns-edit');
        $router->post('/', 'CrownController@store')->name('crowns-store');
        $router->put('/{id}', 'CrownController@update')->name('crowns-update');
    });

    Route::prefix('settings')->group(function () use ($router) {
        $router->get('/', 'SettingsController@index')->name('settings');
        $router->get('/create', 'SettingsController@create')->name('settings-create');
        $router->get('/{id}/edit', 'SettingsController@edit')->name('settings-edit');
        $router->post('/', 'SettingsController@store')->name('settings-store');
        $router->put('/{id}', 'SettingsController@update')->name('settings-update');
    });
});
