<?php

namespace App\Http\Controllers\Admin;

use App\AHK\Notifications\Flash;
use App\AHK\Repositories\Tag\TagRepository;
use App\AHK\Tag;
use App\Http\Requests;
use App\Http\Requests\Admin\StoreTagRequest;
use App\Http\Requests\Admin\UpdateTagRequest;
use Illuminate\Support\Facades\Auth;

class TagsController extends BaseController {
	/**
	 * @var TagRepository
	 */
	private $tagRepository;

	/**
	 * @param TagRepository $tagRepository
	 */
	public function __construct(TagRepository $tagRepository)
	{
		parent::__construct();

		$this->tagRepository = $tagRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$tags = $this->tagRepository->all()->paginate(10);

		return view('admin.articles.tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$tag = new Tag();

		return view('admin.articles.tags.create', compact('tag'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreTagRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreTagRequest $request)
	{
		$tagStored = $this->tagRepository->store(Auth::user(), $request->only('name'));

		if ( ! $tagStored )
		{
			Flash::error(trans('admin.unable_to_store_tag'));

			return redirect()->back();
		}

		Flash::success(trans('admin.tag_created'));

		return redirect()->route('admin.articles.tags.edit', $tagStored);
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
		$tag = $this->tagRepository->getById($id);

		return view('admin.articles.tags.edit', compact('tag'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param UpdateTagRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, UpdateTagRequest $request)
	{
		$tagSaved = $this->tagRepository->updateById($id, $request->only('name'));

		if ( ! $tagSaved )
		{
			Flash::error(trans('admin.something_went_wrong'));

			return redirect()->back();
		}

		Flash::success(trans('admin.tag_updated'));

		return redirect()->route('admin.articles.tags.edit', $tagSaved);
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
