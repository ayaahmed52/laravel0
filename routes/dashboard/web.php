<?php


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::prefix('dashboard')->name('dashboard.')->group(function () {

              Route::get('welcome','DashboardController@index')->name('welcome');

              Route::resource('users','UserController')->except(['show']);
        });
        });


