<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
	protected $fillable = ['name'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function countries()
	{
		return $this->hasMany('App\Ahk\Company');
	}

	/**
	 * Get the user this article was created from.
	 */
	public function author()
	{
		return $this->belongsTo('App\Ahk\User');
	}
}
