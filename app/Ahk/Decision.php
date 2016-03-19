<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Decision.
 *
 * @codeCoverageIgnore
 */
class Decision extends Model
{
    /**
     * Get the file of this decision.
     */
    public function file()
    {
        return $this->belongsTo(File::class);
    }

    /**
     * Get the company of this decision.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the company of this decision.
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}

