<?php

namespace App\Mail;

use App\Models\Bill;
use App\Models\Client;

class BillCreateMail extends BaseMail
{
    public $productName;
    public $client;
    public $link;

    public function __construct(Bill $bill, Client $client)
    {
        parent::__construct($bill->product->project->language);

        $this->productName = $bill->product->name;
        $this->client = $client;
        $this->link = env('COMMON_DOMAIN').'/bill/'. $bill->getIdHash();
    }

    public function build()
    {
        return $this->view('emails.bill-create')
            ->subject($this->client->name. ', '. __('ваш счет для оплаты курса:').$this->productName);
    }
}
