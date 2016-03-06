<?php
################ chamb.net ####################

# Pages
Route::get('/', ['as' => 'home_path', 'uses' => 'Ahk\HomeController@home']);
Route::get('about-us', ['as' => 'about_path', 'uses' => 'Ahk\HomeController@about']);
Route::get('lang/{lang}', ['as' => 'set_language', 'uses' => 'Ahk\SettingsController@setLocale']);

Route::group(['prefix' => 'my'], function ()
{
	Route::resource('companies', 'Ahk\User\CompaniesController', ['except' => ['destroy']]);
	Route::get('profile', ['as' => 'my.profile', 'uses' => 'Ahk\HealthController@news']);
});

Route::group(['prefix' => 'industries/{industry_slug}'], function ()
{
	Route::get('info', ['as' => 'industries.info', 'uses' => 'Ahk\IndustriesController@info']);
	Route::get('news', ['as' => 'industries.news', 'uses' => 'Ahk\IndustriesController@news']);
	Route::get('work-groups', ['as' => 'industries.work_groups', 'uses' => 'Ahk\IndustriesController@workGroups']);
	Route::get('work-groups/{work_group_slug}', ['as' => 'industries.work_groups.show', 'uses' => 'Ahk\IndustriesController@workGroupShow']);
	Route::get('events', ['as' => 'industries.events', 'uses' => 'Ahk\WorkingGroupsController@index']);
	Route::get('links', ['as' => 'industries.links', 'uses' => 'Ahk\WorkingGroupsController@index']);
	Route::get('downloads', ['as' => 'industries.downloads', 'uses' => 'Ahk\IndustriesController@index']);
	Route::get('companies', ['as' => 'industries.companies', 'uses' => 'Ahk\IndustriesController@companies']);
	Route::get('companies/{company_slug}', ['as' => 'industries.companies.show', 'uses' => 'Ahk\IndustriesController@companyShow']);
});

Route::group(['prefix' => 'files'], function ()
{
	Route::get('render', ['as' => 'files.render', 'uses' => 'FilesController@render']);
});

# Working Groups

Route::get('terms-of-use', ['as' => 'terms_of_use_path', 'uses' => 'Ahk\HomeController@termsOfUse']);

# Authentication
Route::group(['prefix' => 'auth'], function ()
{
	Route::get('sign-in', ['as' => 'auth.sign_in', 'uses' => 'Ahk\Auth\AuthenticationController@getLogin']);
	Route::post('sign-in', ['as' => 'auth.sign_in', 'uses' => 'Ahk\Auth\AuthenticationController@postLogin']);
	Route::get('reset', ['as' => 'auth.reset', 'uses' => 'Ahk\Auth\AuthenticationController@getReset']);
	Route::delete('logout', ['as' => 'auth.destroy', 'uses' => 'Ahk\Auth\AuthenticationController@destroy']);
	Route::get('register', ['as' => 'auth.register', 'uses' => 'Ahk\Auth\RegistrationController@getRegistration']);
	Route::post('register', ['as' => 'auth.register', 'uses' => 'Ahk\Auth\RegistrationController@postRegistration']);
	Route::get('register/confirm', ['as' => 'auth.register.confirm', 'uses' => 'Ahk\Auth\RegistrationController@confirmEmail']);

	Route::group(['prefix' => 'recover'], function ()
	{
		Route::get('/', ['as' => 'auth.recover.get', 'uses' => 'Ahk\Auth\PasswordResetsController@getEmail']);
		Route::post('/', ['as' => 'auth.recover.post', 'uses' => 'Ahk\Auth\PasswordResetsController@postEmail']);
		Route::get('/reset/{slug}/{recovery_token}', ['as' => 'auth.recover.reset', 'uses' => 'Ahk\Auth\PasswordResetsController@getReset']);
		Route::post('/reset/{slug}/{recovery_token}', ['as' => 'auth.recover.reset', 'uses' => 'Ahk\Auth\PasswordResetsController@postReset']);
	});
});


################ chamb.net/cms ####################

Route::group(['prefix' => 'cms'], function ()
{
	Route::get('', ['as' => 'cms.dashboard', 'uses' => 'Cms\DashboardController@dashboard']);

	Route::get('dashboard', ['as' => 'cms.dashboard', 'uses' => 'Cms\DashboardController@dashboard']);
	Route::group(['prefix' => 'users'], function ()
	{
		Route::get('subscribers', ['as' => 'cms.users.subscribers', 'uses' => 'Cms\UsersController@subscribers']);
		Route::get('administrators', ['as' => 'cms.users.administrators', 'uses' => 'Cms\UsersController@administrators']);
	});

	# Companies
	Route::resource('companies', 'Cms\CompaniesController', ['only' => ['index']]);

	# Articles
	Route::group(['prefix' => 'articles'], function ()
	{
		Route::get('published', ['as' => 'cms.articles.published', 'uses' => 'Cms\ArticlesController@published']);
		Route::get('unpublished', ['as' => 'cms.articles.unpublished', 'uses' => 'Cms\ArticlesController@unpublished']);
		Route::resource('categories', 'Cms\CategoriesController', ['except' => ['show', 'destroy']]);
		Route::resource('tags', 'Cms\TagsController', ['except' => ['show', 'destroy']]);
	});
	Route::resource('articles', 'Cms\ArticlesController', ['except' => ['index', 'show', 'destroy']]);

	# Users
	Route::get('users', ['as' => 'cms.users', 'uses' => 'Cms\DashboardController@dashboard']);

	# Authentication
	Route::get('auth/sign-in', ['as' => 'cms.sessions.create', 'uses' => 'Cms\SessionsController@create']);
	Route::post('auth/sign-in', ['as' => 'cms.sessions.store', 'uses' => 'Cms\SessionsController@store']);
	Route::delete('auth/logout', ['as' => 'cms.sessions.destroy', 'uses' => 'Cms\SessionsController@destroy']);
	Route::get('lang/{lang}', ['as' => 'cms.set_language', 'uses' => 'Cms\SettingsController@setLocale']);
});
