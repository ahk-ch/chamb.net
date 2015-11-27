<?php

namespace App\Http\Controllers\Admin;

use App\AHK\Article;
use App\AHK\Notifications\Flash;
use App\AHK\Repositories\Article\ArticleRepository;
use App\AHK\Repositories\Category\CategoryRepository;
use App\AHK\Repositories\Tag\TagRepository;
use App\Http\Requests;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function published()
	{
		$articles = $this->articleRepository->published()->paginate(10);

		return view('admin.articles.index', compact('articles'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function unpublished()
	{
		$articles = $this->articleRepository->unpublished()->paginate(10);

		return view('admin.articles.index', compact('articles'));
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

		$selectedTags = $article->tags()->lists('id')->toArray();

		return view('admin.articles.create', compact('tags', 'categories', 'article', 'selectedTags'));
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
			Auth::user(), $request->only(['title', 'description', 'publish', 'source', 'content']), $category);

		if ( ! $articleStored )
		{
			Flash::error(trans('admin.unable_to_store_article'));

			return redirect()->back();
		}

		Flash::success(trans('admin.article_created'));

		$tagsStored = $this->articleRepository->updateTagsById($articleStored->id, $request->get('tagIds', []));

		if ( ! $tagsStored ) Flash::error(trans('admin.unable_to_attach_tags'));

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

		if ( $article === null )
		{
			Flash::error('admin.article_does_exists');

			return redirect()->route('admin.articles.published');
		}

		$tags = $this->tagRepository->all()->lists('name', 'id');

		$selectedTags = $article->tags()->lists('id')->toArray();

		$categories = $this->categoryRepository->all()->lists('name', 'id');

		return view('admin.articles.edit', compact('article', 'tags', 'categories', 'selectedTags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateArticleRequest $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, UpdateArticleRequest $request)
	{
		$article = $this->articleRepository->getById($id);

		if ( $article === null )
		{
			Flash::error('admin.article_does_not_exists');

			return redirect()->back();
		}

		$category = $this->categoryRepository->getById($request->get('category_id'));

		$articleUpdated = $this->articleRepository->updateById(
			$id, $request->only(['title', 'description', 'publish', 'source', 'content']), $category);

		if ( ! $articleUpdated )
		{
			Flash::error(trans('admin.unable_to_update_article'));

			return redirect()->back();
		}

		Flash::success(trans('admin.article_updated'));

		$tagsUpdated = $this->articleRepository->updateTagsById($articleUpdated->id, $request->get('tagIds', []));

		if ( ! $tagsUpdated ) Flash::error(trans('admin.unable_to_update_tags'));

		return redirect()->route('admin.articles.edit', $articleUpdated);
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
