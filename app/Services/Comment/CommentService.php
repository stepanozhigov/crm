<?php


namespace App\Services\Comment;


use App\Models\Comment;

class CommentService
{

    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function addNewComment(array $data): ?Comment
    {
        return $this->commentRepository->create($data);
    }
}
