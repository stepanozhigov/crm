<?php


namespace App\Services\Mailerlite;


use Http\Client\HttpClient;
use MailerLiteApi\MailerLite;

class MailerLiteApi extends MailerLite
{
    public function __construct($apiKey = null, HttpClient $httpClient = null)
    {
        parent::__construct($this->getApiKey(), $httpClient);
    }

    protected function getApiKey(): string
    {
        return env('API_KEY_MAILERLITE');
    }

}
