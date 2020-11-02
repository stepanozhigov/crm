<?php

namespace App\View\Components\Forms;

use App\Models\Webinar;

class WebinarForm extends FormComponent
{
    public function __construct(Webinar $model = null)
    {
        parent::__construct($model ?: new Webinar());
    }
    public function render()
    {
        return view('crm.components.forms.webinar-form');
    }
}
