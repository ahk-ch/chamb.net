<?php
/*
|--------------------------------------------------------------------------
| chamb.net/cms
|--------------------------------------------------------------------------
|
| Accessible to administrators, and authors.
*/
$this->group(['prefix' => 'cms'], function () {

    // Authentication
    $this->get('auth/sign-in', ['as' => 'cms.sessions.create', 'uses' => 'Cms\SessionsController@create']);
    $this->post('auth/sign-in', ['as' => 'cms.sessions.store', 'uses' => 'Cms\SessionsController@store']);
    $this->get('lang/{lang}', ['as' => 'cms.set_language', 'uses' => 'Cms\SettingsController@setLocale']);

    $this->group(['middleware' => 'cms.auth'], function () {
        $this->get('/', ['as' => 'cms.dashboard', 'uses' => 'Cms\DashboardController@dashboard']);

        $this->get('dashboard', ['as' => 'cms.dashboard', 'uses' => 'Cms\DashboardController@dashboard']);
        $this->group(['prefix' => 'users'], function () {
            $this->get('subscribers', ['as' => 'cms.users.subscribers', 'uses' => 'Cms\UsersController@subscribers']);
            $this->get('administrators',
                ['as' => 'cms.users.administrators', 'uses' => 'Cms\UsersController@administrators']);
        });

        // Companies
        $this->resource('companies', 'Cms\CompaniesController', ['only' => ['index']]);

        // Articles
        $this->group(['prefix' => 'articles'], function () {
            $this->get('published', ['as' => 'cms.articles.published', 'uses' => 'Cms\ArticlesController@published']);
            $this->get('unpublished',
                ['as' => 'cms.articles.unpublished', 'uses' => 'Cms\ArticlesController@unpublished']);
            $this->resource('categories', 'Cms\CategoriesController', ['except' => ['show', 'destroy']]);
            $this->resource('tags', 'Cms\TagsController', ['except' => ['show', 'destroy']]);
        });
        $this->resource('articles', 'Cms\ArticlesController', ['except' => ['index', 'show', 'destroy']]);

        // Users
        $this->get('users', ['as' => 'cms.users', 'uses' => 'Cms\DashboardController@dashboard']);

        // Authentication
        $this->delete('auth/logout', ['as' => 'cms.sessions.destroy', 'uses' => 'Cms\SessionsController@destroy']);
    });
});

