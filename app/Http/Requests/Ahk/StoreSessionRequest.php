<?php

namespace App\Http\Requests\Ahk;

use App\Ahk\Notifications\Flash;
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
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ];
    }

    public function response(array $messages)
    {
        Flash::error(trans('ahk_messages.validation_error_occurred'));

        return parent::response($messages);
    }
}
j
