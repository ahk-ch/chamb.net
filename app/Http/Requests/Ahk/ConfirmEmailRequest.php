<?php

namespace App\Http\Requests\Ahk;

use App\Ahk\Notifications\Flash;
use App\Http\Requests\Request;

class ConfirmEmailRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required|exists:users,token',
        ];
    }

    public function getRedirectUrl()
    {
        return route('auth.sign_in');
    }

    public function response(array $messages)
    {
        Flash::error(trans('ahk_messages.validation_error_occurred'));

        return parent::response($messages);
    }
}

