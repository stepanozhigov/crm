<?php

namespace App\View\Components\Forms;

use App\Models\Discount;
use App\Models\Product;
use App\Models\UpSale;
use Illuminate\View\Component;

class UpSaleForm extends FormComponent
{
    public $products;

    public function __construct(UpSale $model = null)
    {
        parent::__construct($model ?: new UpSale());
        $this->products = Product::query()
            ->with('project')
            ->whereNotIn('type', [Product::TYPE_CONSTRUCT, Product::TYPE_CONSULT])
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
        return view('crm.components.forms.up-sale-form');
    }
}
