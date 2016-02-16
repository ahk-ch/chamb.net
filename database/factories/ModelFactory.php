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

use App\Ahk\Article;
use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\Industry;
use App\Ahk\OffersService;
use App\Ahk\RequiresService;
use App\Ahk\Service;
use App\Ahk\User;

$factory->define(User::class, function (Faker\Generator $faker)
{
	return [
		'name'       => "$faker->firstName $faker->lastName",
		'email'      => $faker->unique()->email,
		'avatar_url' => $faker->imageUrl(),
		'password'   => bcrypt(str_random(10)),
	];
});


$factory->define(App\Ahk\Industry::class, function (Faker\Generator $faker)
{
	return [
		'name'      => $faker->unique()->word,
		'author_id' => factory(User::class)->create()->id,
	];
});

$factory->define(App\Ahk\Tag::class, function (Faker\Generator $faker)
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
$factory->defineAs(App\Ahk\Article::class, 'without_industry', function (Faker\Generator $faker) use ($factory)
{
	$article = factory(Article::class, 'without_relations')->make();

	return array_merge($article->toArray(), [
		'author_id' => factory(User::class)->create()->id,
	]);
});

$factory->defineAs(App\Ahk\Article::class, 'without_relations', function (Faker\Generator $faker) use ($factory)
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
		'industry_id'          => factory(Industry::class)->create()->id,
		'country_id'           => factory(Country::class)->create()->id,
		'requires_services_id' => factory(RequiresService::class)->create()->id,
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
	$name = $faker->unique()->name;

	return [
		'name'                    => $name,
		'slug'                    => \Illuminate\Support\Str::slug($name),
		'logo'                    => $faker->imageUrl(),
		'description'             => $faker->paragraph,
		'business_leader'         => $faker->name,
		'name_of_contact_partner' => $faker->name,
	];
});

$factory->define(App\Ahk\Country::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->unique()->name,
	];
});

$factory->define(Industry::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->unique()->name,
	];
});

$factory->define(Service::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->unique()->name,
	];
});
