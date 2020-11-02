<?php


namespace App\Http\Livewire;


use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

abstract class MainRowComponent extends Component
{
    public $model;
    public $modelDeleted = false;

    public function mount(Model $model)
    {
        $this->model = $model;
    }

    public function delete()
    {
        if ($this->model) {
            $this->model->delete();
            $this->modelDeleted = true;
        }
    }

}
