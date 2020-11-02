<?php


namespace App\Services\MailerGroup;


use App\Models\MailerliteGroup;
use App\Models\Product;
use App\Services\Mailerlite\MailerLiteApi;

class MailerGroupService
{
    public $mailerGroupRepository;
    public $mailerLiteApi;

    public function __construct(MailerGroupRepository $mailerGroupRepository, MailerLiteApi $mailerLiteApi)
    {
        $this->mailerGroupRepository = $mailerGroupRepository;
        $this->mailerLiteApi = $mailerLiteApi;
    }

    public function createByAdminPanel(array $data): ?MailerliteGroup
    {
        $product = Product::findOrFail($data['product_id']);
        $groupData = $this->getGroupData($data, $product);

        $response = $this->mailerLiteApi->groups()->create($groupData);

        if (isset($response->error)) {
            return null;
        }

        return $this->mailerGroupRepository->createGroup((array)$response, $product->id, $data['paid']);
    }

    public function editByAdminPanel(array $data, MailerliteGroup $mailerGroup): ?MailerliteGroup
    {
        $product = $mailerGroup->product;
        $groupData = $this->getGroupData($data, $product);

        $response = $this->mailerLiteApi->groups()->update($mailerGroup->ml_group_id, $groupData);

        if (isset($response->error)) {
            return null;
        }

        return $this->mailerGroupRepository->updateGroupName($mailerGroup, $groupData);
    }

    public function removeGroup(int $id): bool
    {
        $response = $this->mailerLiteApi->groups()->delete($id);

        if ($response['success']) {
            return $this->mailerGroupRepository->deleteGroupByMlId($id);
        } else {
            return false;
        }
    }

    public function getAllGroups(): \MailerLiteApi\Common\Collection
    {
        $response = $this->mailerLiteApi->groups()->get();

        return $response;
    }

    private function getGroupData(array $data, Product $product)
    {
        if ($data['name']) {
            $groupData = ['name' => $data['name']];
        } else {
            $paidStatus = $data['paid'] ? 'paid' : 'free';
            $name = "Клиенты продукта: {$product->name} ({$product->project->name}) " . $paidStatus;
            $groupData = ['name' => $name];
        }

        return $groupData;
    }

}
