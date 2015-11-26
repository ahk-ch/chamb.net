<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreArticleRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'       => 'required|unique:articles,name|min:1',
			'published'   => 'boolean',
			'source'      => 'url',
			'description' => 'required|min:1',
			'content'     => 'required|min:1',
			'category_id' => 'required|exists:categories,id',
			'tagIds'      => 'array|exists:categories,id',
		];
	}
}
