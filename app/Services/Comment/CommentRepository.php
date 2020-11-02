<?php


namespace App\Services\Comment;


use App\Models\Comment;

class CommentRepository
{
    public function create(array $data): Comment
    {
        $comment = new Comment($data);
        $comment->save();

        return $comment;
    }

    public function editById(int $id, array $data): ?Comment
    {
        $comment = Comment::find($id)->fill($data);
        $comment->save();

        return $comment;
    }
}
