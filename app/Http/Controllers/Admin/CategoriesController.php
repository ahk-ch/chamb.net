<?php

namespace App\Http\Controllers\Admin;

use App\AHK\Repositories\Category\CategoryRepository;
use App\Http\Requests;

class CategoriesController extends BaseController {
	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;

	/**
	 * CategoriesController constructor.
	 * @param CategoryRepository $categoryRepository
	 */
	public function __construct(CategoryRepository $categoryRepository)
	{
		parent::__construct();

		$this->categoryRepository = $categoryRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$categories = $this->categoryRepository->all();

		return view('admin.articles.categories.index', compact('categories'));
	}
}
