<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Family;
use Faker\Generator as Faker;

$factory->define(Family::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(10,122),
        'note'=>$faker->country,
        'sex'=>$faker->sex,
    ];
});
