<?php

namespace App\View\Components\Forms;

use App\Models\PaymentMethod;


class PaymentMethodForm extends FormComponent
{
    public $statuses;

    public function __construct(PaymentMethod $model = null)
    {
        parent::__construct($model ?: new PaymentMethod());
        $this->statuses = [
            0 => 'Не активный',
            1 => 'Активный'
        ];
    }

    public function render()
    {
        return view('crm.components.forms.payment-method-form');
    }
}
