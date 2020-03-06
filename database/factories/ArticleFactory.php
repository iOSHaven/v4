<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->words(5, true);
    return [
        "title" => $title,
        'slug' => Str::slug($title),
        'subtitle' => $title . ' ' . $faker->words($faker->numberBetween(2,5), true),
        "image" => "https://loremflickr.com/320/240?uniquerandom=" . $faker->randomNumber(),
        'content' => $faker->paragraphs(5, true),
        'user_id' => 1
    ];
});
