<?php

namespace App\Listeners;

use App\Events\BillCreate;
use App\Mail\BillCreateMail;
use App\Services\SendMail\EmailService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailBillCreate implements ShouldQueue
{

    public function handle(BillCreate $event)
    {
        $client = $event->bill->client;
        $locale = $event->bill->product->project->language;
        Mail::to($client)
            ->locale($locale)
            ->send(new BillCreateMail($event->bill, $client));
    }
}
