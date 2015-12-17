<?php

namespace App\Providers;

use App\AHK\Repositories\Article\ArticleRepository;
use App\AHK\Repositories\Article\DbArticleRepository;
use App\AHK\Repositories\Category\CategoryRepository;
use App\AHK\Repositories\Category\DbCategoryRepository;
use App\AHK\Repositories\Company\CompanyRepository;
use App\AHK\Repositories\Company\DbCompanyRepository;
use App\AHK\Repositories\Tag\DbTagRepository;
use App\AHK\Repositories\Tag\TagRepository;
use App\AHK\Repositories\User\DbUserRepository;
use App\AHK\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(UserRepository::class, DbUserRepository::class);
		$this->app->bind(CategoryRepository::class, DbCategoryRepository::class);
		$this->app->bind(TagRepository::class, DbTagRepository::class);
		$this->app->bind(ArticleRepository::class, DbArticleRepository::class);
		$this->app->bind(CompanyRepository::class, DbCompanyRepository::class);
	}
}
