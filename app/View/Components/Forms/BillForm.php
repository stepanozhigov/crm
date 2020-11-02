<?php

namespace App\View\Components\Forms;

use App\Models\Bill;

class BillForm extends FormComponent
{
    public $clients;
    public function __construct($clients, Bill $model = null)
    {
        parent::__construct($model ?: new Bill());
        $this->clients = $clients;
    }
    public function render()
    {
        return view('crm.components.forms.bill-form');
    }
}
