<?php

namespace App\Http\Livewire\Tables;

use App\Models\Client;

class ClientTable extends TableComponent
{
    public $email;
    public $name;
    public $status = '-1';

    protected function setModel()
    {
        $this->model = Client::class;
    }

    public function render()
    {
        $models = Client::query()
            ->orderBy($this->orderField, $this->order);

        if ($this->email) {
            $models->where('email', 'like', "%{$this->email}%");
        }

        if ($this->name) {
            $models->where('email', 'like', "%{$this->name}%");
        }

        if ($this->status !== '-1') {
            $models->where('status', $this->status);
        }

        return view('crm.livewire.client-table', [
            'models' => $models->paginate($this->perPage)
        ]);
    }
}
