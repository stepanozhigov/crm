<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bill;
use Faker\Generator as Faker;

$factory->define(Bill::class, function (Faker $faker) {
    return [
        'client_id' => rand(1,10),
        'product_id' => rand(1,8),
        'invoice_status' => rand(1,3),
        'sum' => rand(1,4)*1000,
        'sum_src' => rand(3,6)*1000,
    ];
});
