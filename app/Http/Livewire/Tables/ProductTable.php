<?php

namespace App\Http\Livewire\Tables;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductTable extends TableComponent
{
    public $productName;
    public $projectName;
    public $type;
    public $productTypesList;

    public function mount(Request $request)
    {
        parent::mount($request);
        $this->productTypesList = [
            0 => '--',
            1 => 'ОК',
            2 => 'СК',
            3 => 'Консультация',
            4 => 'Конструктор',
            5 => 'Другое',
        ];
    }

    protected function setModel()
    {
        $this->model = Product::class;
    }

    public function render()
    {
        $models = Product::query()
            ->select(['products.*', 'projects.name as project_name'])
            ->leftJoin('projects','products.project_id', '=', 'projects.id')
            ->orderBy($this->orderField, $this->order);

        if ($this->productName) {
            $models->where('products.name', 'like', "%{$this->productName}%");
        }

        if ($this->projectName) {
            $models->where('projects.name', 'like', "%{$this->projectName}%");
        }

        if ($this->type) {
            $models->where('type', $this->type);
        }

        return view('crm.livewire.product-table', [
            'models' => $models->paginate($this->perPage)
        ]);
    }


}
