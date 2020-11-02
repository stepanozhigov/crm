<?php

namespace App\View\Components\Forms;

use App\Models\Coauthor;
use App\Models\Product;
use App\Models\Project;
use Arr;

class ProductForm extends FormComponent
{
    public $selectProjects;
    public $selectTypes;
    public $selectCommissionTypes;

    public function __construct(Product $model = null)
    {
        parent::__construct($model ?: new Product());
        $this->selectProjects = Project::pluck('name', 'id');
        $this->selectTypes = [
            Product::TYPE_OK => 'Основной курс',
            Product::TYPE_SK => 'Специальный курс',
            Product::TYPE_CONSULT => 'Консультация',
            Product::TYPE_CONSTRUCT => 'Конструктор',
            Product::TYPE_OTHER => 'Другое',
        ];
        $this->selectCommissionTypes = Coauthor::getCoauthors();
    }

    public function render()
    {
        return view('crm.components.forms.product-form');
    }
}
