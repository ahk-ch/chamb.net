<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = ['name', 'logo', 'name_of_contact_partner'];
}
