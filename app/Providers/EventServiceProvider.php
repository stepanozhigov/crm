<?php

namespace App\Providers;

use App\Events\BillCreate;
use App\Events\BillPaid;
use App\Events\NewCommentAnswer;
use App\Listeners\AccessToAccount;
use App\Listeners\MailerLiteChangeGroup;
use App\Listeners\MailerLiteCreateSubscriber;
use App\Listeners\SendMailBillCreate;
use App\Listeners\MailSent;
use App\Listeners\SendMailCommentAnswer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Mail\Events\MessageSent;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BillPaid::class => [
            MailerLiteChangeGroup::class,
            AccessToAccount::class,
        ],
        BillCreate::class => [
            MailerLiteCreateSubscriber::class,
            SendMailBillCreate::class
        ],
        NewCommentAnswer::class => [
            SendMailCommentAnswer::class
        ],
        MessageSent::class => [
            MailSent::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
