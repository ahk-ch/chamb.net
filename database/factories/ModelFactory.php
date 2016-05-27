<?php

use App\Ahk\File;
use App\Ahk\User;


$factory->define(User::class, function (Faker\Generator $faker) {
    $user = factory(User::class, 'relationless')->make();

    return array_merge($user->toArray(),
        ['avatar_id' => factory(File::class)->create()->id]);
});

