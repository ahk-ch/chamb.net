<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\AHK
 */
class Role extends Model
{
	/**
	 *
	 */
	const COMPANY_REPRESENTATIVE = 'CompanyRepresentative';


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function roles()
	{
		return $this->belongsToMany('App\AHK\Role')->withTimestamps();
	}
}
