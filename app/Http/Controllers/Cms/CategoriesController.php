<?php

namespace App\Http\Controllers\Cms;

use App\AHK\Category;
use App\AHK\Notifications\Flash;
use App\AHK\Repositories\Category\IndustryRepository;
use App\Http\Requests;
use App\Http\Requests\Cms\StoreCategoryRequest;
use App\Http\Requests\Cms\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends BaseController {
	/**
	 * @var IndustryRepository
	 */
	private $categoryRepository;

	/**
	 * CategoriesController constructor.
	 * @param IndustryRepository $categoryRepository
	 */
	public function __construct(IndustryRepository $categoryRepository)
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
		$categories = $this->categoryRepository->all()->paginate(10);

		return view('cms.articles.categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$category = new Category();

		return view('cms.articles.categories.create', compact('category'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreCategoryRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCategoryRequest $request)
	{
		$categoryStored = $this->categoryRepository->store($request, Auth::user());

		if ( ! $categoryStored )
		{
			Flash::error(trans('cms.unable_to_store_category'));

			return redirect()->back();
		}

		Flash::success(trans('cms.category_created'));

		return redirect()->route('cms.articles.categories.edit', $categoryStored);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$category = $this->categoryRepository->getById($id);

		return view('cms.articles.categories.edit', compact('category'));
	}

	/**
	 * Update the specified category in storage.
	 *
	 * @param $id
	 * @param UpdateCategoryRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update($id, UpdateCategoryRequest $request)
	{
		$categorySaved = $this->categoryRepository->updateById($id, $request->only('name'));

		if ( ! $categorySaved )
		{
			Flash::error(trans('cms.something_went_wrong'));

			return redirect()->back();
		}

		Flash::success(trans('cms.category_updated'));

		return redirect()->route('cms.articles.categories.edit', $categorySaved);
	}
}
