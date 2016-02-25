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
	$user = factory(User::class, 'with_primary_data')->make();

	return array_merge($user->toArray(),
		['avatar_id' => factory(File::class)->create()->id,]);
});

$factory->defineAs(App\Ahk\User::class, 'with_primary_data', function (Faker\Generator $faker) use ($factory)
{
	return [
		'name'               => "$faker->firstName $faker->lastName",
		'email'              => $faker->unique()->email,
		'password'           => bcrypt(str_random(10)),
		'verified'           => 0,
		User::RECOVERY_TOKEN => str_random(),
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
	return [
		'name'            => $faker->unique()->name,
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
	$fileWithPrimaryData = factory(File::class, 'without_storage')->make();
	$storageLocation = FilesStorage::getFilesDirectory();
	$clientOriginalName = "dummy_logo.png";
	$tempFilePath = file_get_contents(storage_path("app/testing/$clientOriginalName"));
	$fileLocation = $storageLocation . $clientOriginalName;

	Storage::put($fileLocation, $tempFilePath);

	return array_merge($fileWithPrimaryData->toArray(), [
		'path'                 => $fileLocation,
		'client_original_name' => $clientOriginalName,
	]);
});

$factory->defineAs(File::class, 'without_storage', function (Faker\Generator $faker) use ($factory)
{
	$name = $faker->unique()->name;
	$clientOriginalName = "{$faker->name}.{$faker->fileExtension}";
	$storageLocation = FilesStorage::getFilesDirectory();
	$fileLocation = $storageLocation . $clientOriginalName;

	return [
		'name'                 => $name,
		'path'                 => $fileLocation,
		'description'          => $faker->paragraph(),
		'client_original_name' => $clientOriginalName,
	];
});
