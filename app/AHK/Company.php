<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\AHK
 */
class Company extends Model
{
	protected $fillable = ['name', 'logo', 'name_of_contact_partner'];


	/**
	 * Get the firm that owns this event.
	 */
	public function industry()
	{
		return $this->belongsTo('App\AHK\Industry');
	}
}
