<?php

################ chamb.net ####################

# Pages
get('/', ['as' => 'home_path', 'uses' => 'AHK\HomeController@home']);
get('about', ['as' => 'about_path', 'uses' => 'AHK\HomeController@about']);
get('community', ['as' => 'companies_path', 'uses' => 'AHK\HomeController@companies']);
get('lang/{lang}', ['as' => 'set_language', 'uses' => 'AHK\SettingsController@setLocale']);
Route::group(['prefix' => 'health'], function () {
    get('info', ['as' => 'health.info', 'uses' => 'AHK\HealthController@info']);
    get('news', ['as' => 'health.news', 'uses' => 'AHK\HealthController@news']);
});
get('terms_of_use', ['as' => 'terms_of_use', 'uses' => 'AHK\HomeController@termsOfUse']);

# Registration
post('users/store', ['as' => 'users.store', 'uses' => 'AHK\UsersController@store']);

# Authentication
Route::group(['prefix' => 'auth'], function () {
    post('login', ['as' => 'sessions.store', 'uses' => 'AHK\SessionsController@store']);
    delete('logout', ['as' => 'sessions.destroy', 'uses' => 'AHK\SessionsController@destroy']);
});

################ cms.chamb.net ####################

Route::group(['prefix' => 'admin'], function () {
    get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
    Route::group(['prefix' => 'users'], function () {
        get('subscribers', ['as' => 'admin.users.subscribers', 'uses' => 'Admin\UsersController@subscribers']);
        get('administrators', ['as' => 'admin.users.administrators', 'uses' => 'Admin\UsersController@administrators']);
    });

    # Articles
    Route::group(['prefix' => 'articles'], function () {
        get('published', ['as' => 'admin.articles.published', 'uses' => 'Admin\ArticlesController@published']);
        get('unpublished', ['as' => 'admin.articles.unpublished', 'uses' => 'Admin\ArticlesController@unpublished']);
        Route::resource('categories', 'Admin\CategoriesController', ['except' => ['show', 'destroy']]);
        Route::resource('tags', 'Admin\TagsController', ['except' => ['show', 'destroy']]);
    });
    Route::resource('articles', 'Admin\ArticlesController', ['except' => ['index', 'show', 'destroy']]);


    # Users
    get('users', ['as' => 'admin.users', 'uses' => 'Admin\DashboardController@dashboard']);

    # Authentication
    get('auth/login', ['as' => 'admin.sessions.create', 'uses' => 'Admin\SessionsController@create']);
    post('auth/login', ['as' => 'admin.sessions.store', 'uses' => 'Admin\SessionsController@store']);
    delete('auth/logout', ['as' => 'admin.sessions.destroy', 'uses' => 'Admin\SessionsController@destroy']);
    get('lang/{lang}', ['as' => 'admin.set_language', 'uses' => 'Admin\SettingsController@setLocale']);
});
