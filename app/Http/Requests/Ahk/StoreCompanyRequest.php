<?php

namespace App\Http\Requests\Ahk;

use App\Http\Requests\Request;

class StoreCompanyRequest extends Request
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
			'name'            => 'required|max:255|unique:companies,name',
			'industry_id'     => 'required|exists:industries,id',
			'country_id'      => 'required|exists:countries,id',
			'business_leader' => 'required|max:255|unique:companies,business_leader',
			'address'         => 'max:255',
			'email'           => 'email|max:255',
			'phone_number'    => 'max:255',
			'focus'           => 'max:100',
			'description'     => 'max:700',
			'logo_path'       => 'required|image',
		];
	}
}
