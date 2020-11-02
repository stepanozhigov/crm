<?php

namespace App\View\Components\Forms;

use App\Models\MailerliteGroup;
use App\Models\Product;
use Arr;

class MailerGroupForm extends FormComponent
{
    public $products;

    public function __construct(MailerliteGroup $model = null)
    {
        parent::__construct($model ?: new MailerliteGroup());
        $this->products = Product::pluck('name', 'id');
    }

    public function render()
    {
        return view('crm.components.forms.mailer-group-form');
    }
}
