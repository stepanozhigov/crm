<?php

namespace App\Mail;

use App\Models\Bill;
use App\Models\Client;

class GiveAccessMail extends BaseMail
{
    public $client;
    public $productName;
    public $lkUrl;
    public $tmpPassword;

    public function __construct(Client $client, Bill $bill, $tmpPassword)
    {
        parent::__construct($bill->product->project->language);
        
        $this->client = $client;
        $this->tmpPassword = $tmpPassword;
        $this->productName = $bill->product->name;
        $this->lkUrl = $bill->product->project->domain . env('LK_DOMAIN');
    }

    public function build()
    {
        return $this->view('emails.give-access')
            ->subject("[{$this->productName}] ". __('Ваши личные доступы к материалам курса'));
    }
}
