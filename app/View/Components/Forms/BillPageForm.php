<?php

namespace App\View\Components\Forms;

use App\Models\Page;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Support\Arr;

class BillPageForm extends FormComponent
{
    public $projects;
    public $products;

    public function __construct(Page $model = null)
    {
        parent::__construct($model ?: new Page());
        $this->projects = Project::pluck('name', 'id')->all();
        $this->products = Product::pluck('name', 'id')->all();
    }

    public function render()
    {
        return view('crm.components.forms.bill-page-form');
    }

}
