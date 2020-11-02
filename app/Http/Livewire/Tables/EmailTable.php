<?php

namespace App\Http\Livewire\Tables;


use App\Models\Email;

class EmailTable extends TableComponent
{
    public $email;

    public function render()
    {
        $models = Email::query()
            ->with('client')
            ->orderBy($this->orderField, $this->order)
        ;

        if ($this->email) {
            $models->where('email', 'like', "%{$this->email}%");
        }

        return view('crm.livewire.email-table', [
            'models' => $models->paginate($this->perPage)
        ]);
    }

    protected function setModel()
    {
        $this->model = Email::class;
    }
}
