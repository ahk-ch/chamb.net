<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   23/11/2015
 */
Breadcrumbs::register('home', function ($breadcrumbs)
{
	$breadcrumbs->push(trans('breadcrumbs.home'), route('home_path'));
});

Breadcrumbs::register('about', function ($breadcrumbs)
{
	$breadcrumbs->push(trans('breadcrumbs.about'), route('home_path'));
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
