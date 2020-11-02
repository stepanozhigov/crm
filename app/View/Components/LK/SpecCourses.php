<?php

namespace App\View\Components\LK;

use App\Models\Client;
use App\Models\Product;
use App\Models\Project;
use Illuminate\View\Component;

class SpecCourses extends Component
{
    public $client;
    public $products;

    public function __construct(Project $project, Client $client)
    {
        $this->client = $client;
        $openProductsId = $client->openCourses($project->id)->pluck('id');
        $this->products = Product::where('project_id', $project->id)
            ->where('type', Product::TYPE_SK)
            ->whereNotIn('id', $openProductsId)
            ->get();
    }


    public function render()
    {
        return view('lk.components.spec-courses');
    }
}
