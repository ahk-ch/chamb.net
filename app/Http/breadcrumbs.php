<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   23/11/2015
 */
Breadcrumbs::register('home_path', function ($breadcrumbs)
{
	$breadcrumbs->push(trans('breadcrumbs.home'), route('home_path'));
});

Breadcrumbs::register('health.info', function ($breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.health_info'), route('health.info'));
});

Breadcrumbs::register('health.news', function ($breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.health_news'), route('health.news'));
});

Breadcrumbs::register('companies_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.companies'), route('health.news'));
});

Breadcrumbs::register('about_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.about'), route('home_path'));
});

Breadcrumbs::register('auth.login', function ($breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.login'), route('auth.login'));
});

Breadcrumbs::register('auth.register', function ($breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.register'), route('auth.register'));
});
