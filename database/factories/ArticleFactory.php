<?php

use App\Ahk\Article;
use App\Ahk\File;

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

