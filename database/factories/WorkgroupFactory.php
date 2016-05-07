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

use App\Ahk\User;
use App\Ahk\Workgroup;

$factory->define(Workgroup::class, function (Faker\Generator $faker) {
    $workgroup = factory(Workgroup::class, 'relationless')->make();

    return array_merge($workgroup->toArray(), [
        'creator_id' => factory(User::class)->create()->id,
    ]);
});

$factory->defineAs(Workgroup::class, 'relationless', function (Faker\Generator $faker) {
    $startDate = $faker->dateTimeBetween();
    $endDate = $faker->dateTimeBetween($startDate);

    return [
        'name'        => $faker->unique()->name,
        'description' => $faker->paragraph(),
        'start_date'  => $startDate,
        'end_date'    => $endDate,
    ];
});
