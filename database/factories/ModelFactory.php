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

use App\AHK\User;

$factory->define(User::class, function (Faker\Generator $faker)
{
	return [
		'name'           => $faker->name,
		'username'       => $faker->userName,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
	];
});

$factory->define(App\AHK\Category::class, function (Faker\Generator $faker)
{
	return [
		'name'      => implode(' ', $faker->words),
		'author_id' => factory(User::class)->create()->id,
	];
});

$factory->define(App\AHK\Tag::class, function (Faker\Generator $faker)
{
	return [
		'name'      => implode(' ', $faker->words),
		'author_id' => factory(User::class)->create()->id,
	];
});
