<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'uid' => rand(1, 10),
        'title' => $faker->title,
        'desn' => $faker->bank,
        'cnt' => $faker->text
    ];
});
