<?php

namespace App\View\Components\Forms;

use App\Helpers\DiscountHelper;
use App\Models\Discount;
use App\Models\Project;
use Illuminate\View\Component;

class DiscountForm extends FormComponent
{
    public $discountTypes;
    public $products;

    public function __construct(Discount $model = null)
    {
        parent::__construct($model ?: new Discount());
        $this->discountTypes = DiscountHelper::getDiscountTypesForForm();
        $projects = Project::query()->with('products')->get();
        foreach ($projects as $project) {
            $this->products[$project->name] = \Arr::pluck($project->products, 'name', 'id');
        }
    }

    public function render()
    {
        return view('crm.components.forms.discount-form');
    }
}
