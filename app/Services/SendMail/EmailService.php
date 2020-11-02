<?php


namespace App\Services\SendMail;


use App\Models\Client;
use Illuminate\Mail\Message;

class EmailService
{
    protected $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function createSendMail(Client $client, Message $message)
    {

        $data = [
            'email' => $client->email,
            'client_id' => $client->id,
            'subject' => $message->getSubject(),
            'content' => $message->getBody(),
            'status' => 1
        ];

        $this->emailRepository->create($data);
    }

}
