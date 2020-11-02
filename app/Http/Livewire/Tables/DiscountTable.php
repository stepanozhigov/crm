<?php

namespace App\Http\Livewire\Tables;

use App\Models\Discount;

class DiscountTable extends TableComponent
{
    public function render()
    {
        return view('crm.livewire.discount-table', [
            'models' => Discount::query()->orderBy($this->orderField, $this->order)->paginate($this->perPage)
        ]);
    }

    protected function setModel()
    {
        $this->model = Discount::class;
    }
}
