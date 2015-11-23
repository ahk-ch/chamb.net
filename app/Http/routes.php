<?php

get('/', ['as' => 'home_path', 'uses' => 'HomeController@home']);
get('about', ['as' => 'about_path', 'uses' => 'HomeController@about']);
get('companies', ['as' => 'companies_path', 'uses' => 'HomeController@companies']);

Route::group(['prefix' => 'health'], function ()
{
	get('info', ['as' => 'health.info', 'uses' => 'HealthController@info']);
	get('news', ['as' => 'health.news', 'uses' => 'HealthController@news']);
});

Route::group(['prefix' => 'auth'], function ()
{
	get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
	get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
});

Route::group(['prefix' => 'admin'], function ()
{
	get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
	get('auth/login', ['as' => 'admin.auth.login', 'uses' => 'Admin\Auth\AuthController@getLogin']);
});
