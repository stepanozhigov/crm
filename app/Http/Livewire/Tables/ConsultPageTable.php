<?php

namespace App\Http\Livewire\Tables;

use App\Models\Page;

class ConsultPageTable extends TableComponent
{
    public function render()
    {
        return view('crm.livewire.consult-page-table', [
            'models' => Page::query()
                ->where('type', Page::TYPE_CONSULT)
                ->orderBy($this->orderField, $this->order)
                ->paginate($this->perPage)
        ]);
    }

    protected function setModel()
    {
        $this->model = Page::class;
    }
}
