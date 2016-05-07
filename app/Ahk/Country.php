<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country.
 *
 * @codeCoverageIgnore
 */
class Country extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Country::class);
    }
}
