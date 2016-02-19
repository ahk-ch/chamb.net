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
			'nameInputField'           => 'required|max:255|unique:companies,name,' . $this->get('id'),
			'businessLeaderInputField' => 'required|max:255|unique:companies,business_leader,' . $this->get('id'),
			'addressInputField'        => 'max:255',
			'emailInputField'          => 'email|max:255,' . $this->get('id'),
			'phoneNumberInputField'    => 'max:255',
			'focusInputField'          => 'max:100',
			'descriptionInputField'    => 'max:700',
			'logoInputField'           => 'image',
		];
	}
}
