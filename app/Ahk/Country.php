<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $fillable = ['name'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function companies()
	{
		return $this->hasMany('App\Ahk\Country');
	}
}
