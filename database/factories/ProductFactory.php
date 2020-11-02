<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'project_id' => rand(1, 5),
        'type' => rand(1,3),
        'name' => $faker->word,
        'price' => rand(1,5)*1000,
        'fake_price' => rand(5,8)*1000,
        'unlim_bills' => rand(0,1)

    ];
});
