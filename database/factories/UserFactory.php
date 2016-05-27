<?php


use App\Ahk\File;
use App\Ahk\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    $user = factory(User::class, 'relationless')->make();

    return array_merge($user->toArray(),
        ['avatar_id' => factory(File::class)->create()->id]);
});

$factory->defineAs(User::class, 'relationless', function (Faker\Generator $faker) {
    return [
        'name'               => "$faker->firstName $faker->lastName",
        'email'              => $faker->unique()->email,
        'password'           => bcrypt(str_random(10)),
        'verified'           => 1,
        User::RECOVERY_TOKEN => str_random(),
        'facebook_url'       => $faker->url,
        'twitter_url'        => $faker->url,
        'linked_in_url'      => $faker->url,
        'website_url'        => $faker->url,
    ];
});
