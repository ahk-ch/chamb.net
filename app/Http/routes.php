<?php

get('/', ['as' => 'home_path', 'uses' => 'HomeController@home']);
get('about', ['as' => 'about_path', 'uses' => 'HomeController@about']);
get('health/info', ['as' => 'health_info', 'uses' => 'HealthController@info']);
get('health/news', ['as' => 'health_news', 'uses' => 'HealthController@news']);

