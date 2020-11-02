<?php


namespace App\Mail;


use App\Models\Client;
use App\Models\Comment;

class NewCommentAnswerMail extends BaseMail
{
    public $comment;
    public $client;
    public $link;

    public function __construct(Client $client, Comment $comment)
    {
        parent::__construct($comment->product->project->language);

        $this->comment = $comment;
        $this->client = $client;
        $this->link = 'https://'. $this->comment->product->project->domain . env('LK_DOMAIN'). "/comment/{$this->comment->id}";
    }

    public function build()
    {
        $subject = __('Ответ на ваш комментарий на Delichev.com');
        return $this->view('emails.comment-answer')
            ->subject($subject);
    }
}
