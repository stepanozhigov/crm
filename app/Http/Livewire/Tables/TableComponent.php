<?php


namespace App\Http\Livewire\Tables;


use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;


abstract class TableComponent extends Component
{
    use WithPagination;

    public $model;
    public $perPage = 20;
    public $editInputDisplay = 'none';
    public $field;
    public $modelId;
    public $updateValue;
    public $order = 'desc';
    public $orderField = 'id';

    protected $listeners = ['updateField', 'editInput'];

    protected $paginationTheme = 'bootstrap';

    abstract protected function setModel();

    public function mount(Request $request)
    {
        if ($request->sort) {
            $this->orderField = array_key_first($request->sort);
            $this->order = $request->sort[$this->orderField];
        }
        $this->setModel();
    }

    public function setPerPage($perPage) {
        $this->perPage = $perPage;
        $this->gotoPage(1);
    }

    public function sort($field, $order)
    {
        $this->orderField = $field;
        $this->order = $order;
        $this->emit('sort', [
            'orderField' => $this->orderField,
            'order' => $this->order,
        ]);
    }

    public function delete($id)
    {
        if ($model = $this->model::find($id)) {
            $model->delete();
            $this->afterDelete();
        }
    }

    public function editInput($value, $field, $modelId)
    {
        $this->updateValue = $value;
        $this->field = $field;
        $this->modelId = $modelId;
        $this->editInputDisplay = 'block';
        $this->emit('editInputEvent');
    }

    public function updateField($updateValue)
    {
        if ($updateValue && $model = $this->model::find($this->modelId)) {
            $model->update([$this->field => $updateValue]);
        }
        $this->afterUpdateField();
        $this->hideInput();
    }

    public function hideInput()
    {
        $this->editInputDisplay = 'none';
    }

    protected function afterUpdateField()
    {
        session()->flash('success', 'Запись успешно обновлена!');
    }

    protected function afterDelete()
    {
        session()->flash('success', 'Запись успешно удалена!');
    }

}
