<?php

namespace App\Http\Requests\Ahk;

use App\Ahk\Repositories\User\UserRepository;
use App\Http\Requests\Request;

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
		return $userRepository->hasCompanyBySlug($this->get('slug'));
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
	}
}
