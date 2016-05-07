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
use App\Ahk\Category;
use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\Decision;
use App\Ahk\Event;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Service;
use App\Ahk\Storage\FilesStorage;
use App\Ahk\Tag;
use App\Ahk\User;
use Illuminate\Support\Facades\Storage;

$factory->define(Industry::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->unique()->uuid,
        'fontawesome' => $faker->name,
        'author_id'   => factory(User::class)->create()->id,
    ];
});

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->unique()->word,
        'author_id' => factory(User::class)->create()->id,
    ];
});

$factory->define(Article::class, function (Faker\Generator $faker) {
    $article = factory(Article::class, 'relationless')->make();

    return array_merge($article->toArray(), [
        'author_id'    => factory(User::class)->create()->id,
        'industry_id'  => factory(Industry::class)->create()->id,
        'thumbnail_id' => factory(File::class)->create()->id,
    ]);
});

$factory->defineAs(App\Ahk\Article::class, 'without_industry', function (Faker\Generator $faker) {
    $article = factory(Article::class, 'relationless')->make();

    return array_merge($article->toArray(), [
        'author_id'    => factory(User::class)->create()->id,
        'thumbnail_id' => factory(File::class)->create()->id,
    ]);
});

$factory->defineAs(App\Ahk\Article::class, 'relationless', function (Faker\Generator $faker) {
    $content = "<p><img src='$faker->imageUrl'></p>";
    $content .= "<p><strong>{$faker->sentence()}</strong></p>";
    $content .= "<p>{$faker->paragraphs(3, true)}</p>";
    $content .= '<p>';
    $content .= "<a href='$faker->url'>$faker->sentence</a>";
    $content .= $faker->paragraphs(3, true);
    $content .= '</p>';
    $content .= '<p>';
    $content .= $faker->paragraphs(3, true);
    $content .= '</p>';
    $createdAt = $faker->dateTimeBetween();
    $updatedAt = $faker->dateTimeBetween($createdAt);

    return [
        'title'       => $faker->sentence,
        'publish'     => $faker->boolean,
        'source'      => $faker->url,
        'description' => $faker->paragraph,
        'content'     => $content,
        'view_count'  => $faker->numberBetween(),
        'created_at'  => $createdAt,
        'updated_at'  => $updatedAt
    ];

});

$factory->define(Company::class, function (Faker\Generator $faker) {

    $company = factory(Company::class, 'relationless')->make();

    return array_merge($company->toArray(), [
        'industry_id' => factory(Industry::class)->create()->id,
        'country_id'  => factory(Country::class)->create()->id,
        'user_id'     => factory(User::class)->create()->id,
        'logo_id'     => factory(File::class)->create()->id,
    ]);
});

$factory->defineAs(Company::class, 'without_industry', function (Faker\Generator $faker) {

    $company = factory(Company::class, 'relationless')->make();

    return array_merge($company->toArray(), [
        'country_id' => factory(Country::class)->create()->id,
        'user_id'    => factory(User::class)->create()->id,
        'logo_id'    => factory(File::class)->create()->id,
    ]);
});

$factory->defineAs(Company::class, 'relationless', function (Faker\Generator $faker) {
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

$factory->define(Service::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});

$factory->define(File::class, function (Faker\Generator $faker) {
    $fileWithPrimaryData = factory(File::class, 'without_storage')->make();
    $storageLocation = FilesStorage::getFilesDirectory();
    $clientOriginalName = $faker->name.$faker->fileExtension;
    $tempFilePath = file_get_contents(storage_path('app/testing/dummy_logo.png'));
    $fileLocation = $storageLocation.$clientOriginalName;

    Storage::put($fileLocation, $tempFilePath);

    return array_merge($fileWithPrimaryData->toArray(), [
        'path'                 => $fileLocation,
        'client_original_name' => $clientOriginalName,
    ]);
});

$factory->defineAs(File::class, 'without_storage', function (Faker\Generator $faker) {
    $name = $faker->unique()->name;
    $clientOriginalName = "{$faker->name}.{$faker->fileExtension}";
    $storageLocation = FilesStorage::getFilesDirectory();
    $fileLocation = $storageLocation.$clientOriginalName;

    return [
        'name'                 => $name,
        'path'                 => $fileLocation,
        'description'          => $faker->paragraph(),
        'client_original_name' => $clientOriginalName,
    ];
});

$factory->define(Event::class, function (Faker\Generator $faker) {
    $startDate = $faker->dateTimeBetween();
    $endDate = $faker->dateTimeBetween($startDate);

    return [
        'name'        => $faker->unique()->name,
        'description' => $faker->paragraph(),
        'start_date'  => $startDate,
        'end_date'    => $endDate,
        'creator_id'  => factory(User::class)->create()->id,
    ];
});

$factory->define(Decision::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->unique()->name,
        'description'   => $faker->paragraph(),
        'decision_date' => $faker->date(),
        'creator_id'    => factory(User::class)->create()->id,
        'file_id'       => factory(File::class)->create()->id,
        'company_id'    => factory(Company::class)->create()->id,
    ];
});

$factory->defineAs(Decision::class, 'without_company', function (Faker\Generator $faker) {
    return [
        'name'          => $faker->unique()->name,
        'description'   => $faker->paragraph(),
        'decision_date' => $faker->date(),
        'creator_id'    => factory(User::class)->create()->id,
        'file_id'       => factory(File::class)->create()->id,
    ];
});
