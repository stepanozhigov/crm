<?php

namespace App\Listeners;


use App\Services\SendMail\EmailService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;

class MailSent implements ShouldQueue
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function handle($event)
    {
        $client = $event->data['client'];
        $message = $event->data['message'];

        $this->emailService->createSendMail($client, $message);
    }
}
