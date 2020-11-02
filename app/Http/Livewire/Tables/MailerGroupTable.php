<?php

namespace App\Http\Livewire\Tables;


use App\Models\MailerliteGroup;
use App\Services\Mailerlite\MailerLiteApi;
use Illuminate\Http\Request;

class MailerGroupTable extends TableComponent
{
    public $groupName;

    public function render()
    {
        $models = MailerliteGroup::query()
            ->select(['mailerlite_groups.*', 'products.name as product_name'])
            ->leftJoin('products','mailerlite_groups.product_id', '=', 'products.id')
            ->orderBy($this->orderField, $this->order);

        if ($this->groupName) {
            $models->where('mailerlite_groups.name', 'like', "%{$this->groupName}%");
        }

        return view('crm.livewire.mailer-group-table', [
            'models' => $models->paginate($this->perPage)
        ]);
    }

    public function delete($id)
    {
        $mailerLiteApi = new MailerLiteApi();
        $response = $mailerLiteApi->groups()->delete($id);

        if (isset($response->success) && $model = $this->model::where('ml_group_id', $id)->first()) {
            $model->delete();
            session()->flash('success', 'Группа успешно удалена!');
        } else {
            session()->flash('error', 'Произошла ошибка!');
        }

    }

    protected function setModel()
    {
        $this->model = MailerliteGroup::class;
    }
}
