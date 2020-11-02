<?php

namespace App\View\Components\Forms;

use App\Models\PaymentMethod;
use App\Models\Project;
use Arr;
use Illuminate\View\Component;

class ProjectForm extends FormComponent
{
    public $paymentMethods;

    public function __construct(Project $model = null)
    {
        parent::__construct($model ?: new Project());
        $this->paymentMethods =PaymentMethod::pluck('name', 'id');
    }

    public function render()
    {
        return view('crm.components.forms.project-form');
    }
}
