<?php

namespace App\Http\Controllers\Ahk;

use App\Ahk\Industry;
use App\Ahk\Repositories\Article\ArticleRepository;
use App\Ahk\Repositories\Industry\IndustryRepository;
use App\Http\Controllers\Controller;

class IndustriesController extends Controller
{
	/**
	 * @var ArticleRepository
	 */
	private $articleRepository;
	/**
	 * @var IndustryRepository
	 */
	private $industryRepository;


	/**
	 * CategoriesController constructor.
	 * @param ArticleRepository $articleRepository
	 * @param IndustryRepository $industryRepository
	 */
	public function __construct(ArticleRepository $articleRepository,
	                            IndustryRepository $industryRepository)
	{
		$this->articleRepository = $articleRepository;
		$this->industryRepository = $industryRepository;
	}

	/**
	 * Display a listing of the info resource.
	 *
	 * @param Industry $industry
	 * @return \Illuminate\Http\Response
	 */
	public function info(Industry $industry)
	{
		return view("ahk.industries.info", compact('industry'));
	}

	/**
	 * Display a listing of the news resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function news()
	{
		$articles = $this->articleRepository->published()->paginate(6);

		return view('ahk.health.news', compact('articles'));
	}

	/**
	 * Display a listing of the news resource.
	 *
	 * @param Industry $industry
	 * @return \Illuminate\Http\Response
	 */
	public function workGroups(Industry $industry)
	{
		return view('ahk.industries.work_groups', compact('industry'));
	}

	/**
	 * Display a listing of the news resource.
	 *
	 * @param Industry $industry
	 * @return \Illuminate\Http\Response
	 */
	public function companies(Industry $industry)
	{
		$companies = $this->industryRepository->getCompanies($industry);

		return view('ahk.industries.work_groups', compact('industry', 'companies'));
	}
}

