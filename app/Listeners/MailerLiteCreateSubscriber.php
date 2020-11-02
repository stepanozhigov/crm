<?php

namespace App\Listeners;

use App\Events\BillCreate;
use App\Services\MailerGroup\MailerGroupService;
use App\Services\MailerSubscriber\MailerSubscriberService;
use Illuminate\Contracts\Queue\ShouldQueue;


class MailerLiteCreateSubscriber implements ShouldQueue
{
    protected $mailerSubscriberService;
    protected $mailerGroupService;

    public function __construct(MailerSubscriberService $mailerSubscriberService, MailerGroupService $mailerGroupService)
    {
        $this->mailerSubscriberService = $mailerSubscriberService;
        $this->mailerGroupService = $mailerGroupService;
    }

    //add subscriber in free mailerlite group for selected product
    public function handle(BillCreate $event)
    {
        $client = $event->bill->client;
        $product = $event->bill->product;
        $mailerGroupFree = $product->mailerGroupFree;

        if (!$mailerGroupFree) {
            \Log::error("Группы Mailerlite для продукта id: {$product->id}, name: {$product->name} не существует!");
        } else {
            if (!$client->hasMailerGroup($mailerGroupFree)) { // if client isn't in the group
                $this->mailerSubscriberService->addSubscriberToGroup($mailerGroupFree, $client);
            }
        }
    }
}
