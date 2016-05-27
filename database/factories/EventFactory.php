<?php

use App\Ahk\Event;

$factory->define(Event::class, function (Faker\Generator $faker) {
    $startDate = $faker->dateTimeBetween();
    $endDate = $faker->dateTimeBetween($startDate);

    return [
        'name'        => $faker->unique()->name,
        'description' => $faker->paragraph(),
        'start_date'  => $startDate,
        'end_date'    => $endDate,
        'creator_id'  => factory(User::class)->create()->id,
    ];
});


