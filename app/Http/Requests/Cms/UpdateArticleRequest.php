<?php

namespace App\Http\Requests\Cms;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UpdateArticleRequest extends Request
{
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
            'title' => 'required|min:1',
            'img_url' => 'required|url',
            'publish' => 'boolean',
            'source' => 'url',
            'description' => 'required|min:1',
            'content' => 'required|min:1',
            'category_id' => 'required|exists:categories,id',
            'tagIds' => 'array|exists:categories,id',
        ];
    }
}

