<?php

use App\Ahk\Tag;

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->unique()->word,
        'author_id' => factory(User::class)->create()->id,
    ];
});

