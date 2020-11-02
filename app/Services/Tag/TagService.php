<?php


namespace App\Services\Tag;


use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class TagService
{
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function createFromAdminPanel(array $data): Tag
    {
        return $this->tagRepository->createByAdminPanel($data);
    }

    public function updateFromAdminPanel(array $data, Tag $tag): Tag
    {
        return $this->tagRepository->editByAdminPanel($data, $tag);
    }
}
