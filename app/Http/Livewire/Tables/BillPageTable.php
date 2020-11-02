<?php

namespace App\Http\Livewire\Tables;


use App\Models\Page;

class BillPageTable extends TableComponent
{
    public function render()
    {
        return view('crm.livewire.bill-page-table', [
            'models' => Page::query()
                ->where('type', Page::TYPE_BILL)
                ->orderBy($this->orderField, $this->order)
                ->paginate($this->perPage)
        ]);
    }

    protected function setModel()
    {
        $this->model = Page::class;
    }
}
