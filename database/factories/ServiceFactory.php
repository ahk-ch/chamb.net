<?php

use App\Ahk\Service;

$factory->define(Service::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});

