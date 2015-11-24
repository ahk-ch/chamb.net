<?php

get('/', ['as' => 'home_path', 'uses' => 'HomeController@home']);
get('about', ['as' => 'about_path', 'uses' => 'HomeController@about']);
get('companies', ['as' => 'companies_path', 'uses' => 'HomeController@companies']);
get('lang/{lang}', ['as' => 'set_language', 'uses' => 'SettingsController@setLocale']);

Route::group(['prefix' => 'health'], function ()
{
	get('info', ['as' => 'health.info', 'uses' => 'HealthController@info']);
	get('news', ['as' => 'health.news', 'uses' => 'HealthController@news']);
});

Route::group(['prefix' => 'auth'], function ()
{
	get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
	get('register', ['as' => 'auth.register', 'uses' => 'UsersController@create']);
});

Route::group(['prefix' => 'admin'], function ()
{
	get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
	Route::group(['prefix' => 'users'], function ()
	{
		get('subscribers', ['as' => 'admin.users.subscribers', 'uses' => 'Admin\UsersController@subscribers']);
		get('administrators', ['as' => 'admin.users.administrators', 'uses' => 'Admin\UsersController@administrators']);
	});
	get('users', ['as' => 'admin.users', 'uses' => 'Admin\DashboardController@dashboard']);
	get('auth/login', ['as' => 'admin.auth.login', 'uses' => 'Admin\Auth\AuthController@getLogin']);
	get('lang/{lang}', ['as' => 'admin.set_language', 'uses' => 'Admin\SettingsController@setLocale']);
});
