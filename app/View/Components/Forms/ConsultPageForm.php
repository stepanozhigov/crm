<?php

namespace App\View\Components\Forms;

use App\Models\Page;
use App\Models\Product;
use App\Models\Project;

class ConsultPageForm extends FormComponent
{
    public $projects;
    public $consults;

    public function __construct(Page $model = null)
    {
        parent::__construct($model ?: new Page());
        $this->projects = Project::pluck('name', 'id')->all();
        $this->consults = Product::query()
            ->with('project')
            ->where('type', Product::TYPE_CONSULT)
            ->get()
            ->transform(function($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name." ({$item->project->name})"
                ];
            })
            ->pluck('name', 'id')
            ->all();
    }

    public function render()
    {
        return view('crm.components.forms.consult-page-form');

    }
}
