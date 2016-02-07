<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Ahk
 */
class Role extends Model
{
	const COMPANY_REPRESENTATIVE_ROLE = 'CompanyRepresentative';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany('App\Ahk\User')->withTimestamps();
	}
}
