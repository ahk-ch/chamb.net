<?php

namespace App\Providers;

use App\Ahk\Repositories\Article\ArticleRepository;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Repositories\Company\CompanyRepository;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\Industry\IndustryRepository;
use App\Ahk\Repositories\Tag\DbTagRepository;
use App\Ahk\Repositories\Tag\TagRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Repositories\User\UserRepository;
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
		$this->app->bind(IndustryRepository::class, DbIndustryRepository::class);
		$this->app->bind(TagRepository::class, DbTagRepository::class);
		$this->app->bind(ArticleRepository::class, DbArticleRepository::class);
		$this->app->bind(CompanyRepository::class, DbCompanyRepository::class);
	}
}
