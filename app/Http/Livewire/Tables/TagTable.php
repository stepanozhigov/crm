<?php

namespace App\Http\Livewire\Tables;


use App\Models\Tag;

class TagTable extends TableComponent
{
    public function render()
    {
        return view('crm.livewire.tag-table', [
            'models' => Tag::query()
                ->orderBy($this->orderField, $this->order)->paginate($this->perPage)
        ]);
    }

    protected function setModel()
    {
        $this->model = Tag::class;
    }
}
