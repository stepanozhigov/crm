<?php

namespace App\Listeners;

use App\Events\BillPaid;
use App\Services\MailerSubscriber\MailerSubscriberService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use MailerLiteApi\Exceptions\MailerLiteSdkException;

class MailerLiteChangeGroup implements ShouldQueue
{
    public $mailerSubscriberService;

    public function __construct(MailerSubscriberService $mailerSubscriberService)
    {
        $this->mailerSubscriberService = $mailerSubscriberService;
    }

    //change group from free to paid
    public function handle(BillPaid $event)
    {
        $product = $event->bill->product;
        $client = $event->bill->client;

        $group = $product->mailerGroupFree;
        if ($group) {
            try {
                $this->mailerSubscriberService->changeGroupToPaid($client, $group);
            } catch (MailerLiteSdkException $e) {
                \Log::error("Удаление подписчика Mailerlite email: {$client->email} из группы id: $group->id не успешно!");
            }
        } else {
            \Log::error("Группы Mailerlite для продукта id: {$product->id}, name: {$product->name} не существует!");
        }
    }
}
