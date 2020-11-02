<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = \App\Models\Project::all();
        foreach ($projects as $project) {
            Product::create([
                'project_id' => $project->id,
                'type' => 4,
                'name' => 'Конструктор для '.$project->name,
                'price' => 10000,
                'unlim_bills' => 1
            ])->save();
        }
    }
}
