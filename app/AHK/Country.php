<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $fillable = ['name', 'logo', 'name_of_contact_partner'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function companies()
	{
		return $this->hasMany('App\AHK\Country');
	}
}
