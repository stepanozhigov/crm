<?php

namespace App\View\Components\Forms;

use App\Models\Tag;

class TagForm extends FormComponent
{
    public function __construct(Tag $model = null)
    {
        parent::__construct($model ?: new Tag());
    }
    public function render()
    {
        return view('crm.components.forms.tag-form');
    }
}
