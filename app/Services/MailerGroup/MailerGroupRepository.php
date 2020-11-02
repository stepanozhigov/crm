<?php


namespace App\Services\MailerGroup;


use App\Models\MailerliteGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MailerGroupRepository
{
    public function createGroup(array $data, int $product_id, int $paid): MailerliteGroup
    {
        $group = new MailerliteGroup([
            'name' => $data['name'],
            'ml_group_id' => $data['id'],
            'product_id' => $product_id,
            'paid' => $paid,
        ]);
        $group->save();

        return $group;
    }

    public function getAllGroupsByMlId(array $groupsId): Collection
    {
        $groups = MailerliteGroup::whereIn('ml_group_id', $groupsId)->get();

        return $groups;
    }

    public function deleteGroupByMlId($groupId): bool
    {
        $deleted = MailerliteGroup::where('ml_group_id', $groupId)->delete();

        return (bool)$deleted;
    }

    public function getGroupsById(int $id): MailerliteGroup
    {
        return MailerliteGroup::findOrFail($id);
    }

    public function getPaidGroupByProductId(int $productId): Model
    {
        return MailerliteGroup::where('product_id', $productId)
            ->where('paid', 1)
            ->first();
    }

    public function updateGroupName(MailerliteGroup $mailerGroup, array $groupData)
    {
        $mailerGroup->fill($groupData)->save();
        return $mailerGroup;
    }
}
