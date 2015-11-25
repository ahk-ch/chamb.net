<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class StoreUserRequest extends Request {
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
			'username' => 'required|unique:users,username',
			'email'    => 'required|email|max:255|unique:users,email',
			'password' => 'required|min:6',
		];
	}

	public function response(array $messages)
	{
		Flash::error(trans('ahk_messages.validation_error_occurred'));

		return parent::response($messages);
	}
}
