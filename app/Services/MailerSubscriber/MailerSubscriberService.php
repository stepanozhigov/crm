<?php


namespace App\Services\MailerSubscriber;


use App\Models\Client;
use App\Models\ClientMailerlite;
use App\Models\MailerliteGroup;
use App\Services\MailerGroup\MailerGroupRepository;
use App\Services\Mailerlite\MailerLiteApi;
use MailerLiteApi\Exceptions\MailerLiteSdkException;

class MailerSubscriberService
{
    protected $mailerSubscriberRepository;
    protected $mailerLiteApi;
    protected $mailerGroupRepository;

    /**
     * MailerSubscriberService constructor.
     * @param MailerSubscriberRepository $mailerSubscriberRepository
     * @param MailerLiteApi $mailerLiteApi
     * @param MailerGroupRepository $mailerGroupRepository
     */
    public function __construct(
        MailerSubscriberRepository $mailerSubscriberRepository,
        MailerLiteApi $mailerLiteApi,
        MailerGroupRepository $mailerGroupRepository
    ) {
        $this->mailerSubscriberRepository = $mailerSubscriberRepository;
        $this->mailerLiteApi = $mailerLiteApi;
        $this->mailerGroupRepository = $mailerGroupRepository;
    }

    /**
     * @param array $data
     * @return ClientMailerlite
     */
    public function addSubscriberToGroupByAdminPanel(array $data): ClientMailerlite
    {
        $client = Client::findOrFail($data['client_id']);
        $group = MailerliteGroup::findOrFail($data['mailerlite_group_id']);

        return $this->addSubscriberToGroup($group, $client);
    }

    /**
     * @param MailerliteGroup $mlGroup
     * @param Client $client
     * @return ClientMailerlite
     */
    public function addSubscriberToGroup(MailerliteGroup $mlGroup, Client $client): ClientMailerlite
    {
        $subscriberData = [
            'name' => $client->name,
            'email' => $client->email,
            'fields' => []
        ];

        $response = $this->mailerLiteApi->groups()->addSubscriber($mlGroup->ml_group_id, $subscriberData);

        return $this->mailerSubscriberRepository->createSubscriber($client, $response->id, $mlGroup->id);
    }

    /**
     * @param Client $client
     * @param MailerliteGroup $mlGroup
     * @throws \Exception
     */
    public function changeGroupToPaid(Client $client, MailerliteGroup $mlGroup)
    {
        /** @var MailerliteGroup|null $newGroup */
        $newGroup = $this->mailerGroupRepository->getPaidGroupByProductId($mlGroup->product_id);
        if ($newGroup) {
            //add subscriber to paid group if not exist
            $client->subscriberForMlGroupId($newGroup->id)
                ?: $this->addSubscriberToGroup($newGroup, $client);

            //remove subscriber from free group, if exist
            $this->removeSubscriberFromGroup($mlGroup, $client);
        } else {
            \Log::error("Платной группы для продукта {$mlGroup->product->name} не существует");
        }
    }

    /**
     * @param Client $client
     * @param MailerliteGroup $mlGroup
     * @throws \Exception
     */
    public function removeSubscriberFromGroup(MailerliteGroup $mlGroup, Client $client)
    {
        /** @var ClientMailerlite|null $subscriber */
        $subscriber = $client->subscriberForMlGroupId($mlGroup->id);

        if ($subscriber) {
            $this->mailerLiteApi->groups()->removeSubscriber($mlGroup->ml_group_id, $subscriber->ml_client_id);
            $subscriber->delete();
        }
    }

    public function checkSubscriberInGroup(MailerliteGroup $mlGroup, ClientMailerlite $subscriber)
    {
        $this->mailerLiteApi->groups()->getSubscriber($mlGroup->ml_group_id, $subscriber->ml_client_id);
    }

}
