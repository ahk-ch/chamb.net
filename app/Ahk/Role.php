<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role.
 *
 * @codeCoverageIgnore
 */
class Role extends Model
{
    const COMPANY_REPRESENTATIVE_ROLE = 'CompanyRepresentativeRole';
    const AUTHOR_ROLE = 'AuthorRole';

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

