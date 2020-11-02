<?php


namespace App\Events;


use App\Models\Client;
use App\Models\Comment;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCommentAnswer
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;
    public $client;

    public function __construct(Client $client, Comment $comment)
    {
        $this->client = $client;
        $this->comment = $comment;
    }

}
