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

use App\AHK\Article;
use App\AHK\Company;
use App\AHK\Industry;
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


$factory->define(App\AHK\Industry::class, function (Faker\Generator $faker)
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

$factory->define(Article::class, function (Faker\Generator $faker)
{
	$article = factory(Article::class, 'without_relations')->make();

	return array_merge($article->toArray(), [
		'author_id'   => factory(User::class)->create()->id,
		'industry_id' => factory(Industry::class)->create()->id,
	]);
});
$factory->defineAs(App\AHK\Article::class, 'without_industry', function (Faker\Generator $faker) use ($factory)
{
	$article = factory(Article::class, 'without_relations')->make();

	return array_merge($article->toArray(), [
		'author_id' => factory(User::class)->create()->id,
	]);
});

$factory->defineAs(App\AHK\Article::class, 'without_relations', function (Faker\Generator $faker) use ($factory)
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
	];

});


$factory->define(Company::class, function (Faker\Generator $faker)
{
	$company = factory(Company::class, 'without_relations')->make();

	return array_merge($company->toArray(), [
		'industry_id' => factory(Industry::class)->create()->id,
	]);
});

$factory->defineAs(Company::class, 'without_industry', function (Faker\Generator $faker) use ($factory)
{
	$company = factory(Company::class, 'without_relations')->make();

	return array_merge($company->toArray(), [
	]);
});

$factory->defineAs(Company::class, 'without_relations', function (Faker\Generator $faker) use ($factory)
{
	return [
		'name'                    => $faker->unique()->name,
		'logo'                    => $faker->imageUrl(),
		'description'             => $faker->paragraph,
		'name_of_contact_partner' => $faker->name,
	];
});

$factory->define(App\AHK\Country::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->unique()->name,
	];
});

$factory->define(App\AHK\Industry::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->unique()->name,
	];
});
