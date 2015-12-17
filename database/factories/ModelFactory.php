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

use App\AHK\Category;
use App\AHK\User;

$factory->define(User::class, function (Faker\Generator $faker)
{
	return [
		'name'           => "$faker->firstName $faker->lastName",
		'username'       => $faker->unique()->userName,
		'email'          => $faker->unique()->email,
		'avatar_url'     => $faker->imageUrl(),
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
	];
});

$factory->define(App\AHK\Category::class, function (Faker\Generator $faker)
{
	return [
		'name'      => $faker->unique()->word,
		'author_id' => factory(User::class)->create()->id,
	];
});

$factory->define(App\AHK\Tag::class, function (Faker\Generator $faker)
{
	return [
		'name'      => $faker->unique()->word,
		'author_id' => factory(User::class)->create()->id,
	];
});

$factory->define(App\AHK\Article::class, function (Faker\Generator $faker)
{
	$content = "<p><img src='$faker->imageUrl'></p>";
	$content .= "<p><strong>" . $faker->sentence() . "</strong></p>";
	$content .= "<p>" . $faker->paragraphs(3, true) . "</p>";
	$content .= "<p>";
	$content .= "<a href='$faker->url'>$faker->sentence</a>";
	$content .= $faker->paragraphs(3, true);
	$content .= "</p>";
	$content .= "<p>";
	$content .= $faker->paragraphs(3, true);
	$content .= "</p>";

	return [
		'title'       => $faker->sentence,
		'publish'     => $faker->boolean,
		'source'      => $faker->url,
		'img_url'     => $faker->imageUrl(),
		'description' => $faker->paragraph,
		'content'     => $content,
		'author_id'   => factory(User::class)->create()->id,
		'category_id' => factory(Category::class)->create()->id,
	];
});
