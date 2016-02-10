<?php

namespace App\Http\Requests\Ahk;

use App\Ahk\Notifications\Flash;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return ! Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email'          => 'required|email|max:255|unique:users,email',
			'password'       => 'required|confirmed|min:6',
			'agree_to_terms' => 'required',
		];
	}

	public function response(array $messages)
	{
		Flash::error(trans('ahk_messages.validation_error_occurred'));

		return parent::response($messages);
	}
}
