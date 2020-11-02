<?php

namespace App\Http\Livewire\Tables;

use App\Models\ClientMailerlite;
use App\Models\MailerliteGroup;
use App\Services\Mailerlite\MailerLiteApi;
use Livewire\Component;

class MailerSubscriberTable extends TableComponent
{
    public function render()
    {
        return view('crm.livewire.mailer-subscriber-table', [
            'models' => ClientMailerlite::query()->orderBy($this->orderField, $this->order)->paginate($this->perPage)
        ]);
    }

    public function delete($groupId, $id = null)
    {
        $mailerLiteApi = new MailerLiteApi();
        $response = $mailerLiteApi->groups()->removeSubscriber($groupId, $id);
        if (!isset($response->error) && $model = $this->model::where('ml_client_id', $id)->first()) {
            $model->delete();
            session()->flash('success', 'Подписчик успешно удален!');
        } else {
            session()->flash('error', 'Произошла ошибка!');
        }

    }

    protected function setModel()
    {
        $this->model = ClientMailerlite::class;
    }
}
