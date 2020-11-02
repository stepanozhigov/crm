<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            \App\Models\Selling::create([
                'product_id' => $product->id,
                'name' => $product->name,
                'title' => $product->name,
                'slug' => 'slug',
                'youtube_id' => rand(100,200),
                'type' => rand(1,3),
                'private' => rand(0,1),
            ])->save();
        }
    }
}
