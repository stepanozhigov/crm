<?php


namespace App\Services\Tag;

use App\Models\Tag;

class TagRepository
{
    public function createByAdminPanel(array $data): Tag
    {
        $tag = new Tag($data);
        $tag->save();

        return $tag;
    }

    public function editByAdminPanel(array $data, Tag $tag): Tag
    {
        $tag->fill($data)->save();

        return $tag;
    }

    public function getTagByName(string $tag): ?Tag
    {
        return Tag::query()->where('name', $tag)->first();
    }

    /**
     * Create new tag
     *
     * @param string $tagName
     * @param bool   $isNewClient
     *
     * @return Tag
     */
    public function create(string $tagName, bool $isNewClient): Tag
    {
        $tag = new Tag([
            'name'   => $tagName,
            'status' => Tag::STATUS_ACTIVE,
            'is_ml'  => false === $isNewClient,
        ]);
        $tag->save();

        return $tag;
    }
}
