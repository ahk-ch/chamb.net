<?php

namespace App\Http\Requests\Ahk;

use App\Ahk\Repositories\User\UserRepository;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UpdateCompanyRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @param UserRepository $userRepository
	 * @return bool
	 */
	public function authorize(UserRepository $userRepository)
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
			//
		];
		return $userRepository->hasCompanyBySlug(Auth::user(), $this->get('slug'));
	}
}
