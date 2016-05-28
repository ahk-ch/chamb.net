<?php

use App\Ahk\Tag;
use App\Ahk\User;

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->unique()->name,
        'author_id' => factory(User::class)->create()->id,
    ];
});
