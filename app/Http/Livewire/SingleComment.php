<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Services\Comment\CommentRepository;
use App\Services\Comment\CommentService;
use Livewire\Component;
use App\Models\Product;
use App\Models\Client;


class SingleComment extends Component
{
    public $product;
    public $client;
    public $comment;
    public $content;

    protected $listeners = ['addComment'];

    public function mount(Product $product, Client $client, Comment $comment)
    {
        //dd($product);
        $this->product = $product;
        $this->client = $client;
        $this->comment = $comment;
        //$this->onlyMy = false;
    }

    public function addComment()
    {
        if ($this->content) {
            $result = false;
            $commentRepository = new CommentRepository;
            $new_comment = $commentRepository->create([
                'product_id' => $this->product->id,
                'client_id' => $this->client->id,
                'content' => $this->content
            ]);
            $route_name = $this->product->project->domain.'comment';

            if ($new_comment) {
                session()->flash('success', __("Комментарий успешно добавлен! Вы получите уведомление на почту с ответом на него."));
            } else {
                session()->flash('error', __('Произошла ошибка!'));
            }
        } else {
            session()->flash('error', __('Напишите комментарий'));
        }
    }

    public function render()
    {
        //show only public comments
        $comment = $this->comment;
        //dd($comment);
        return view('lk.livewire.single-comment', [
            'comment' => $comment
        ]);
    }
}
