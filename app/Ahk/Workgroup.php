<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function industries()
    {
        return $this->belongsToMany('App\Ahk\Industry')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany('App\Ahk\User')->withTimestamps();
    }

    /**
     * Get creator user
     */
    public function creator()
    {
        return $this->belongsTo('App\Ahk\User');
    }
}

