<?php

namespace App\Http\Requests\Cms;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UpdateTagRequest.
 */
class UpdateTagRequest extends Request
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
            'name' => 'required|min:1|unique:tags,name,'.$this->get('id'),
        ];
    }
}

