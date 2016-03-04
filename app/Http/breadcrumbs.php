<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   23/11/2015
 */
use DaveJamesMiller\Breadcrumbs\Generator;

Breadcrumbs::register('home_path', function (Generator $breadcrumbs)
{
	$breadcrumbs->push(trans('breadcrumbs.home'), route('home_path'));
});

Breadcrumbs::register('health.info', function (Generator $breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.health_info'), route('health.info'));
});

Breadcrumbs::register('health.news', function (Generator $breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.health_news'), route('health.news'));
});

Breadcrumbs::register('companies.index', function (Generator $breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.companies'), route('health.news'));
});

Breadcrumbs::register('about_path', function (Generator $breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.about'), route('home_path'));
});

Breadcrumbs::register('auth.sign_in', function (Generator $breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.sign_in'), route('auth.sign_in'));
});

Breadcrumbs::register('auth.register', function (Generator $breadcrumbs)
{
	$breadcrumbs->parent('home_path');
	$breadcrumbs->push(trans('breadcrumbs.register'), route('auth.register'));
});
