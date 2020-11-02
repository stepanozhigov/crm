<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Services\Comment\CommentRepository;
use App\Services\Comment\CommentService;
use Livewire\Component;
use App\Models\Product;
use App\Models\Client;


class Comments extends Component
{
    public $product;
    public $client;
    public $onlyMy;

    protected $listeners = ['addComment'];

    public function mount(Product $product, Client $client)
    {
        $this->product = $product;
        $this->client = $client;
        $this->onlyMy = false;
    }
    public function setMyCommentsOnly() {
        $this->onlyMy = true;
    }
    public function unsetMyCommentsOnly() {
        $this->onlyMy = false;
    }
    public function addComment($comment, $parentId = null)
    {
        if ($comment) {
            $commentRepository = new CommentRepository;
            $result = $commentRepository->create([
                'product_id' => $this->product->id,
                'client_id' => $this->client->id,
                'content' => $comment,
                'parent_id' => $parentId
            ]);

            if ($result) {
                session()->flash('success', __('Комментарий успешно добавлен! Вы получите уведомление на почту с ответом на него, и они будут тут опубликованы.'));
                if ($parentId) {
                    $this->emit('clearCurrentCommentArea', $parentId);

                } else {
                    $this->emit('clearNewCommentArea');
                }
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
        $comments = Comment::query()
            ->whereNull('parent_id')
            ->with(['client', 'childrenApproved', 'childrenApproved.client'])
            ->where('product_id', $this->product->id)
            ->approved()
            ->publicOnlyOrOfClient($this->client->id)
            ->orderBy('created_at','desc');

        if ($this->onlyMy) {
            $comments->where('client_id', $this->client->id);
        }

        return view('lk.livewire.comments', [
            'comments' => $comments->get()
        ]);
    }
}
