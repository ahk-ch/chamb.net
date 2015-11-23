<?php

get('/', ['as' => 'home_path', 'uses' => 'HomeController@home']);
get('about', ['as' => 'about_path', 'uses' => 'HomeController@about']);
get('companies', ['as' => 'companies_path', 'uses' => 'HomeController@companies']);

Route::group(['prefix' => 'health'], function ()
{
	get('info', ['as' => 'health.info', 'uses' => 'HealthController@info']);
	get('news', ['as' => 'health.news', 'uses' => 'HealthController@news']);
});

