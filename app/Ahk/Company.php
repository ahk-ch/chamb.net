<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company.
 *
 * @codeCoverageIgnore
 */
class Company extends Model implements SluggableInterface
{
    use SluggableTrait;

    const NAME = 'name';
    const LOGO_ID = 'logo_id';
    const COUNTRY_ID = 'country_id';
    const INDUSTRY_ID = 'industry_id';
    const DESCRIPTION = 'description';
    const FOCUS = 'focus';
    const BUSINESS_LEADER = 'business_leader';
    const ADDRESS = 'address';
    const EMAIL = 'email';
    const PHONE_NUMBER = 'phone_number';
    const LOGO_PATH = 'logo_path';
    const SLUG = 'slug';

    /**
     * @var array
     */
    protected $fillable = [
        self::NAME, self::DESCRIPTION, self::FOCUS, self::BUSINESS_LEADER, self::ADDRESS, self::EMAIL,
        self::PHONE_NUMBER, self::SLUG,
    ];

    /**
     * @var array
     */
    protected $sluggable = ['build_from' => self::NAME, 'save_to' => self::SLUG];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return self::SLUG;
    }

    /**
     * Get the industry of this company.
     */
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    /**
     * Get the representative user of this company.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the country of this company.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the country of this company.
     */
    public function logo()
    {
        return $this->belongsTo(File::class);
    }

    /**
     * Get the services this company requires.
     */
    public function requiresServices()
    {
        return $this->belongsToMany(Service::class)->wherePivot('requires', true)->withTimestamps();
    }

    /**
     * Get the services this company requires.
     */
    public function offersServices()
    {
        return $this->belongsToMany(Service::class)->wherePivot('offers', true)->withTimestamps();
    }

    /**
     * Get the services this company requires.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    /**
     * Get the files of this company.
     */
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    /**
     * Get the services this company requires.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get the decisions of this company.
     */
    public function decisions()
    {
        return $this->hasMany(Decision::class);
    }
}
