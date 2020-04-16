<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => rand(2, 10),
        'views' => rand(800, 1000)
    ];
});
