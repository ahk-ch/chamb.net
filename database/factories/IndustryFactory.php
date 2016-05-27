<?php

use App\Ahk\Industry;
use App\Ahk\User;

$factory->define(Industry::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->unique()->uuid,
        'fontawesome' => $faker->name,
        'author_id'   => factory(User::class)->create()->id,
    ];
});
