<?php

namespace App\Http\Controllers\AHK;

/**
 * Health controller.
 *
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   23/11/2015
 */

use App\AHK\Repositories\Article\ArticleRepository;
use App\Http\Requests;

class HealthController extends BaseController {
	/**
	 * @var ArticleRepository
	 */
	private $articleRepository;


	/**
	 * CategoriesController constructor.
	 * @param ArticleRepository $articleRepository
	 */
	public function __construct(ArticleRepository $articleRepository)
	{
		parent::__construct();

		$this->articleRepository = $articleRepository;
	}

	/**
	 * Display a listing of the info resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function info()
	{
		return view('ahk.health.info');
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
}
