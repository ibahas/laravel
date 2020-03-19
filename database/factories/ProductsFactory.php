<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\products;
use Faker\Generator as Faker;

$factory->define(products::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1,10),
        'img' => $faker->numberBetween(0,5000),
        'counter' => $faker->numberBetween(1,1000)
    ];
});
