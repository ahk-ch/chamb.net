<?php

use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\User;

$factory->define(Company::class, function (Faker\Generator $faker) {
    $company = factory(Company::class, 'relationless')->make();

    return array_merge($company->toArray(), [
        'industry_id' => factory(Industry::class)->create()->id,
        'country_id'  => factory(Country::class)->create()->id,
        'user_id'     => factory(User::class)->create()->id,
        'logo_id'     => factory(File::class)->create()->id,
    ]);
});

$factory->defineAs(Company::class, 'without_industry', function (Faker\Generator $faker) {
    $company = factory(Company::class, 'relationless')->make();

    return array_merge($company->toArray(), [
        'country_id' => factory(Country::class)->create()->id,
        'user_id'    => factory(User::class)->create()->id,
        'logo_id'    => factory(File::class)->create()->id,
    ]);
});

$factory->defineAs(Company::class, 'relationless', function (Faker\Generator $faker) {
    return [
        'name'            => $faker->unique()->name,
        'focus'           => $faker->words(10, true),
        'description'     => $faker->paragraph,
        'business_leader' => $faker->name,
        'address'         => $faker->address,
        'email'           => $faker->email,
        'phone_number'    => $faker->phoneNumber,
    ];
});
