<?php


namespace App\Listeners;


use App\Events\NewCommentAnswer;
use App\Mail\NewCommentAnswerMail;
use Illuminate\Support\Facades\Mail;

class SendMailCommentAnswer
{
    public function handle(NewCommentAnswer $event)
    {
        $comment = $event->comment;
        $client = $event->client;
        $locale = $event->comment->product->project->language;
        Mail::to($client)
            ->locale($locale)
            ->send(new NewCommentAnswerMail($client, $comment));
    }
}
