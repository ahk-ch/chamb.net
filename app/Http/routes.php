<?php

################ chamb.net ####################

# Pages
get('/', ['as' => 'home_path', 'uses' => 'AHK\HomeController@home']);
get('about', ['as' => 'about_path', 'uses' => 'AHK\HomeController@about']);
get('community', ['as' => 'companies_path', 'uses' => 'AHK\CompaniesController@index']);
get('lang/{lang}', ['as' => 'set_language', 'uses' => 'AHK\SettingsController@setLocale']);

Route::group(['prefix' => 'health'], function ()
{
	get('info', ['as' => 'health.info', 'uses' => 'AHK\HealthController@info']);
	get('news', ['as' => 'health.news', 'uses' => 'AHK\HealthController@news']);
});

get('terms_of_use', ['as' => 'terms_of_use_path', 'uses' => 'AHK\HomeController@termsOfUse']);

# Registration
post('users/store', ['as' => 'users.store', 'uses' => 'AHK\UsersController@store']);

# Authentication
Route::group(['prefix' => 'auth'], function ()
{
	post('login', ['as' => 'sessions.store', 'uses' => 'AHK\SessionsController@store']);
	delete('logout', ['as' => 'sessions.destroy', 'uses' => 'AHK\SessionsController@destroy']);
});

################ chamb.net/cms ####################

Route::group(['prefix' => 'cms'], function ()
{
	get('', ['as' => 'cms.dashboard', 'uses' => 'Cms\DashboardController@dashboard']);

	get('dashboard', ['as' => 'cms.dashboard', 'uses' => 'Cms\DashboardController@dashboard']);
	Route::group(['prefix' => 'users'], function ()
	{
		get('subscribers', ['as' => 'cms.users.subscribers', 'uses' => 'Cms\UsersController@subscribers']);
		get('administrators', ['as' => 'cms.users.administrators', 'uses' => 'Cms\UsersController@administrators']);
	});

	# Companies
	Route::resource('companies', 'Cms\CompaniesController', ['only' => ['index']]);

	# Articles
	Route::group(['prefix' => 'articles'], function ()
	{
		get('published', ['as' => 'cms.articles.published', 'uses' => 'Cms\ArticlesController@published']);
		get('unpublished', ['as' => 'cms.articles.unpublished', 'uses' => 'Cms\ArticlesController@unpublished']);
		Route::resource('categories', 'Cms\CategoriesController', ['except' => ['show', 'destroy']]);
		Route::resource('tags', 'Cms\TagsController', ['except' => ['show', 'destroy']]);
	});
	Route::resource('articles', 'Cms\ArticlesController', ['except' => ['index', 'show', 'destroy']]);

	# Users
	get('users', ['as' => 'cms.users', 'uses' => 'Cms\DashboardController@dashboard']);

	# Authentication
	get('auth/login', ['as' => 'cms.sessions.create', 'uses' => 'Cms\SessionsController@create']);
	post('auth/login', ['as' => 'cms.sessions.store', 'uses' => 'Cms\SessionsController@store']);
	delete('auth/logout', ['as' => 'cms.sessions.destroy', 'uses' => 'Cms\SessionsController@destroy']);
	get('lang/{lang}', ['as' => 'cms.set_language', 'uses' => 'Cms\SettingsController@setLocale']);
});
