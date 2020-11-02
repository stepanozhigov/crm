<?php


namespace App\Services\MailerSubscriber;


use App\Models\Client;
use App\Models\ClientMailerlite;

class MailerSubscriberRepository
{
    public function createSubscriber(Client $client, $mlClientId, $groupId): ClientMailerlite
    {
        $subscriber = new ClientMailerlite();
        $subscriber->fill([
            'client_id' => $client->id,
            'ml_client_id' => $mlClientId,
            'mailerlite_group_id' => $groupId,
        ]);
        $subscriber->save();

        return $subscriber;
    }

}
