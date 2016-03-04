<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App\Ahk
 * @codeCoverageIgnore
 */
class Service extends Model
{
    /**
     * @var array
     */
    public static $colors = ['color-one', 'color-two', 'color-three', 'color-four', 'color-five',
        'color-six', 'color-seven'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}

