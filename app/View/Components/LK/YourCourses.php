<?php

namespace App\View\Components\LK;

use App\Models\Client;
use App\Models\Product;
use App\Models\Project;
use Illuminate\View\Component;

class YourCourses extends Component
{
    public $client;
    public $products;

    public function __construct(Project $project, Client $client)
    {
        $this->client = $client;
        $this->products = $client->openCourses($project->id);
    }

    public function render()
    {
        return view('lk.components.your-courses');
    }
}
