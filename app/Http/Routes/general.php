<?php
/*
|--------------------------------------------------------------------------
| chamb.net
|--------------------------------------------------------------------------
|
| Accessible to all members.
*/
$this->get('/', ['as' => 'home_path', 'uses' => 'Ahk\HomeController@home']);
$this->get('about-us', ['as' => 'about_path', 'uses' => 'Ahk\HomeController@about']);
$this->get('lang/{lang}', ['as' => 'set_language', 'uses' => 'Ahk\SettingsController@setLocale']);

$this->group(['prefix' => 'my'], function () {
    $this->resource('companies', 'Ahk\User\CompaniesController',
        ['except' => ['destroy'], 'parameters' => ['companies' => 'company_slug']]);

    $this->get('profile', ['as' => 'my.profile', 'uses' => 'Ahk\HealthController@news']);
});

$this->group(['prefix' => 'industries/{industry_slug}'], function () {
    $this->get('info', ['as' => 'industries.info', 'uses' => 'Ahk\IndustriesController@info']);
    $this->get('news', ['as' => 'industries.articles.index', 'uses' => 'Ahk\IndustriesController@indexArticles']);
    $this->get('news/{article_slug}', [
        'as'   => 'industries.articles.show',
        'uses' => 'Ahk\IndustriesController@showArticle'
    ]);
    $this->get('work-groups', [
        'as'   => 'industries.work_groups.index',
        'uses' => 'Ahk\IndustriesController@indexWorkGroup'
    ]);
    $this->get('work-groups/{work_group_slug}', [
        'as'   => 'industries.work_groups.show',
        'uses' => 'Ahk\IndustriesController@showWorkGroup'
    ]);
    $this->get('events', ['as' => 'industries.events', 'uses' => 'Ahk\WorkingGroupsController@index']);
    $this->get('links', ['as' => 'industries.links', 'uses' => 'Ahk\WorkingGroupsController@index']);
    $this->get('downloads', ['as' => 'industries.downloads', 'uses' => 'Ahk\IndustriesController@index']);
    $this->get('companies',
        ['as' => 'industries.companies.index', 'uses' => 'Ahk\IndustriesController@indexCompanies']);
    $this->get('companies/{company_slug}', [
        'as'   => 'industries.companies.show',
        'uses' => 'Ahk\IndustriesController@showCompany'
    ]);
});

$this->group(['prefix' => 'files'], function () {
    $this->get('render', ['as' => 'files.render', 'uses' => 'FilesController@render']);
    $this->get('download', ['as' => 'files.download', 'uses' => 'FilesController@download']);
});

// Working Groups

$this->get('terms-of-use', ['as' => 'terms_of_use_path', 'uses' => 'Ahk\HomeController@termsOfUse']);

// Authentication
$this->group(['prefix' => 'auth'], function () {
    $this->get('sign-in', ['as' => 'auth.sign_in', 'uses' => 'Ahk\Auth\AuthenticationController@getLogin']);
    $this->post('sign-in', ['as' => 'auth.sign_in', 'uses' => 'Ahk\Auth\AuthenticationController@postLogin']);
    $this->get('reset', ['as' => 'auth.reset', 'uses' => 'Ahk\Auth\PasswordResetsController@getReset']);
    $this->delete('logout', ['as' => 'auth.destroy', 'uses' => 'Ahk\Auth\AuthenticationController@destroy']);
    $this->get('register', ['as' => 'auth.register', 'uses' => 'Ahk\Auth\RegistrationController@getRegistration']);
    $this->post('register', ['as' => 'auth.register', 'uses' => 'Ahk\Auth\RegistrationController@postRegistration']);
    $this->get('register/confirm', [
        'as'   => 'auth.register.confirm',
        'uses' => 'Ahk\Auth\RegistrationController@confirmEmail'
    ]);

    $this->group(['prefix' => 'recover'], function () {
        $this->get('/', ['as' => 'auth.recover.get', 'uses' => 'Ahk\Auth\PasswordResetsController@getEmail']);
        $this->post('/', ['as' => 'auth.recover.post', 'uses' => 'Ahk\Auth\PasswordResetsController@postEmail']);
        $this->get('/reset/{slug}/{recovery_token}', [
            'as'   => 'auth.recover.reset',
            'uses' => 'Ahk\Auth\PasswordResetsController@getReset'
        ]);
        $this->post('/reset/{slug}/{recovery_token}', [
            'as'   => 'auth.recover.reset',
            'uses' => 'Ahk\Auth\PasswordResetsController@postReset'
        ]);
    });
});


