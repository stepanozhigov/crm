<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Selling;
use Faker\Generator as Faker;

$factory->define(Selling::class, function (Faker $faker) {
    return [
        'product_id' => rand(1, 20),
        'name' => $faker->word,
        'title' => $faker->word,
        'slug' => $faker->slug,
        'youtube_id' => $faker->password(5, 8),
        'type' => rand(1,3),
        'private' => rand(0,1),
    ];
});
