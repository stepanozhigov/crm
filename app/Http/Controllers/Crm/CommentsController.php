<?php

namespace App\Http\Controllers\Crm;



use App\Models\Comment;
use App\Services\Comment\CommentService;

class CommentsController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        return view('crm.comments.index');
    }

    public function edit(Comment $comment)
    {
        return view('crm.comments.edit', compact('comment'));
    }

}
