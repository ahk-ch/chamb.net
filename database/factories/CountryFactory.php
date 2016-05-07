<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


use App\Ahk\Country;

$factory->define(Country::class, function (Faker\Generator $faker) {
    $country = factory(Country::class, 'relationless')->make();

    return array_merge($country->toArray(), [
    ]);
});

$factory->defineAs(Country::class, 'relationless', function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});
