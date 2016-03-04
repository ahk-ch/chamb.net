<?php

namespace App\Http\Requests\Cms;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreSessionRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ];
    }
}

