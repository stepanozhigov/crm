<?php

namespace App\View\Components\Forms;

use App\Models\Product;
use App\Models\Project;
use Arr;
use Illuminate\View\Component;

class ConstructorForm extends Component
{
    public $project;
    public $products;
    public $checkProducts;

    public function __construct(Project $project)
    {
        $this->products = Product::where('project_id', $project->id)
            ->where('type', Product::TYPE_SK)
            ->pluck('name','id')->all();
        $this->project = $project;
        $this->checkProducts = Arr::pluck($project->productsForConstructor, 'id');
    }

    public function render()
    {
        return view('crm.components.forms.constructor-form');
    }
}
