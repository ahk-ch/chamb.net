<?php

################ AHK ####################

# Pages
get('/', ['as' => 'home_path', 'uses' => 'HomeController@home']);
get('about', ['as' => 'about_path', 'uses' => 'HomeController@about']);
get('companies', ['as' => 'companies_path', 'uses' => 'HomeController@companies']);
get('lang/{lang}', ['as' => 'set_language', 'uses' => 'SettingsController@setLocale']);
Route::group(['prefix' => 'health'], function ()
{
	get('info', ['as' => 'health.info', 'uses' => 'HealthController@info']);
	get('news', ['as' => 'health.news', 'uses' => 'HealthController@news']);
});

# Registration
post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store']);

# Authentication
Route::group(['prefix' => 'auth'], function ()
{
	post('login', ['as' => 'sessions.store', 'uses' => 'SessionsController@store']);
	delete('logout', ['as' => 'sessions.destroy', 'uses' => 'SessionsController@destroy']);
});

################ Administration panel ####################

Route::group(['prefix' => 'admin'], function ()
{
	get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
	Route::group(['prefix' => 'users'], function ()
	{
		get('subscribers', ['as' => 'admin.users.subscribers', 'uses' => 'Admin\UsersController@subscribers']);
		get('administrators', ['as' => 'admin.users.administrators', 'uses' => 'Admin\UsersController@administrators']);
	});
	get('users', ['as' => 'admin.users', 'uses' => 'Admin\DashboardController@dashboard']);
	get('auth/login', ['as' => 'admin.sessions.create', 'uses' => 'Admin\SessionsController@create']);
	post('auth/login', ['as' => 'admin.sessions.store', 'uses' => 'Admin\SessionsController@store']);
	delete('auth/logout', ['as' => 'admin.sessions.destroy', 'uses' => 'Admin\SessionsController@destroy']);
	get('lang/{lang}', ['as' => 'admin.set_language', 'uses' => 'Admin\SettingsController@setLocale']);
});
