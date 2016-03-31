<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   10/2/2016
 */
namespace App\Ahk\Repositories\Country;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CountryRepository.
 */
interface CountryRepository
{
    /**
     * Get all industries.
     *
     * @return Collection
     */
    public function all();
}
