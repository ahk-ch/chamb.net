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
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Service;
use App\Ahk\Storage\FilesStorage;
use App\Ahk\User;
use Illuminate\Support\Facades\Storage;

$factory->define(User::class, function (Faker\Generator $faker)
{
//	Storage::makeDirectory($storageLocation);
//	$avatarLocation = $storageLocation . "logo.png";
//	Storage::put(
//		$avatarLocation,
//		file_get_contents(storage_path('app/testing/dummy_logo.png'))
//	);

	return [
		'name'       => "$faker->firstName $faker->lastName",
		'email'      => $faker->unique()->email,
		'avatar_url' => $faker->imageUrl(),
		'password'   => bcrypt(str_random(10)),
		'verified'   => 0,
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
		'industry_id' => factory(Industry::class)->create()->id,
		'country_id'  => factory(Country::class)->create()->id,
		'user_id'     => factory(User::class)->create()->id,
		'logo_id'     => factory(File::class)->create()->id,
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
	$slug = \Illuminate\Support\Str::slug($name);

	return [
		'slug'            => $slug,
		'name'            => $name,
		'focus'           => $faker->words(10, true),
		'description'     => $faker->paragraph,
		'business_leader' => $faker->name,
		'address'         => $faker->address,
		'email'           => $faker->email,
		'phone_number'    => $faker->phoneNumber,
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

$factory->define(File::class, function (Faker\Generator $faker)
{
	$fileWithPrimaryData = factory(File::class, 'with_primary_data')->make();

	Storage::put($fileWithPrimaryData->path,
		file_get_contents(storage_path('app/testing/dummy_logo.png')));


	return array_merge($fileWithPrimaryData->toArray(), []);
});

$factory->defineAs(File::class, 'with_primary_data', function (Faker\Generator $faker) use ($factory)
{
	$name = $faker->unique()->name;
	$slug = \Illuminate\Support\Str::slug($name);
	$storageLocation = FilesStorage::getFilesDirectory();
	$fileLocation = $storageLocation . $slug . ".png";

	return [
		'name'        => $name,
		'description' => $faker->paragraph(),
		'path'        => $fileLocation,
	];
});
