<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

abstract class BaseMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(string $lang)
    {
        $name    = config('mail.from.names')[$lang] ?? config('mail.from.name');
        $address = config('mail.from.address');

        $this->from($address, $name);
    }
}
