<?php

namespace App\View\Components\Forms;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class ClientForm extends FormComponent
{
    public $projects;
    public $projectModels;

    public function __construct(Client $model = null)
    {
        parent::__construct($model ?: new Client());
        $this->projectModels = Project::with('productsSK', 'productsOK')->get();
        $this->projects = Arr::pluck($this->projectModels, 'name', 'id');
    }

    public function render()
    {
        return view('crm.components.forms.client-form');
    }
}
