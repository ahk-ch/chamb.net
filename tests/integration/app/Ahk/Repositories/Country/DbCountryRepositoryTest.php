<?php
use App\Ahk\Country;
use App\Ahk\Repositories\Country\DbCountryRepository;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */
class DbCountryRepositoryTest extends \tests\TestCase
{
    /** @test */
    public function it_stores_country()
    {
        $dbCountryRepository = new DbCountryRepository();
        $countryModel = new Country;
        $countryFillableKeys = $countryModel->getFillable();

        $expectedCountryData = array_only(factory(Country::class, 'relationless')->make()->toArray(), $countryFillableKeys);

        $this->dontSeeInDatabase('countries', $expectedCountryData);

        $country = $dbCountryRepository->store($expectedCountryData);

        $this->assertNotFalse($country);

        $this->seeInDatabase('countries', $expectedCountryData);
    }
}
