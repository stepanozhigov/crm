<?php

namespace App\View\Components\Forms;

use App\Models\Client;
use App\Models\ClientMailerlite;
use App\Models\MailerliteGroup;
use Arr;

class MailerSubscriberForm extends FormComponent
{
    public $clients;
    public $groups;

    public function __construct(ClientMailerlite $model = null)
    {
        parent::__construct($model ?: new ClientMailerlite());
        $this->clients = Client::pluck('email', 'id');
        $this->groups = MailerliteGroup::pluck('name', 'id');
    }

    public function render()
    {
        return view('crm.components.forms.mailer-subscriber-form');
    }
}
