<?php

namespace App\Http\Livewire\Tables;


use App\Models\UpSale;

class UpSaleTable extends TableComponent
{
    public function render()
    {
        return view('crm.livewire.up-sale-table', [
            'models' => UpSale::query()->paginate($this->perPage)
        ]);
    }

    public function delete($id)
    {
        /* @var UpSale $model */
        if ($model = $this->model::find($id)) {
            $model->additionalProducts()->detach();
            $model->delete();
            $this->afterDelete();
        }
    }

    protected function setModel()
    {
        $this->model = UpSale::class;
    }

}
