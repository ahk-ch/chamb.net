<?php

namespace App\Http\Controllers\Admin;

use App\AHK\Article;
use App\AHK\Notifications\Flash;
use App\AHK\Repositories\Article\ArticleRepository;
use App\AHK\Repositories\Category\CategoryRepository;
use App\AHK\Repositories\Tag\TagRepository;
use App\Http\Requests;
use App\Http\Requests\Admin\StoreArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends BaseController {

	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;
	/**
	 * @var TagRepository
	 */
	private $tagRepository;
	/**
	 * @var ArticleRepository
	 */
	private $articleRepository;

	/**
	 * CategoriesController constructor.
	 * @param ArticleRepository $articleRepository
	 * @param CategoryRepository $categoryRepository
	 * @param TagRepository $tagRepository
	 */
	public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository,
	                            TagRepository $tagRepository)
	{
		parent::__construct();

		$this->categoryRepository = $categoryRepository;
		$this->tagRepository = $tagRepository;
		$this->articleRepository = $articleRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$article = new Article();

		$tags = $this->tagRepository->all()->lists('name', 'id');

		$categories = $this->categoryRepository->all()->lists('name', 'id');

		return view('admin.articles.create', compact('tags', 'categories', 'article'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreArticleRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreArticleRequest $request)
	{
		$category = $this->categoryRepository->getById($request->get('category_id'));

		$articleStored = $this->articleRepository->store(
			Auth::user(), $request->only(['title', 'description', 'publish', 'source', 'content']),
			$category, $request->get('tagIds', []));

		if ( ! $articleStored )
		{
			Flash::error(trans('admin.unable_to_store_article'));

			return redirect()->back();
		}

		Flash::success(trans('admin.article_created'));

		return redirect()->route('admin.articles.edit', $articleStored);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$article = $this->articleRepository->getById($id);

		$tags = $this->tagRepository->all()->lists('name', 'id');

		$categories = $this->categoryRepository->all()->lists('name', 'id');

		return view('admin.articles.edit', compact('article', 'tags', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
