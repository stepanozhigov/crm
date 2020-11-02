<?php

namespace App\Http\Livewire\Tables;

use App\Events\NewCommentAnswer;
use App\Mail\NewCommentAnswerMail;
use App\Models\Client;
use App\Models\Comment;
use App\Services\Comment\CommentRepository;
use App\Services\Comment\CommentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentTable extends TableComponent
{
    public $active = [true, false, false, false];
    public $commentCounts = [0, 0, 0, 0];
    public $filter = null;
    public $queryFilter;

    protected $queryString = [
        'queryFilter' => ['except' => 0],
        'page' => ['except' => 1]
    ];
    protected $listeners = ['answer', 'answerPrivate', 'updateField', 'editInput'];

    public function mount(Request $request)
    {
        //set sort and model in parent
        parent::mount($request);

        //set count of models on page from url
        //default - class default
        if($request->query('perPage') > 0) $this->fill($request->only('perPage'));

        //filter by all/pending/approved/trash
        //all - default value
        $this->queryFilter = $request->queryFilter ?? 0;
        $this->fill(request()->only('queryFilter', $request->queryFilter));
        if ($this->queryFilter) {
            $this->filter($this->queryFilter);
        }
    }

    public function render()
    {
        //return Comments by filter values
        $models = Comment::query()
            ->with(['product', 'client'])
            ->orderBy($this->orderField, $this->order);

        if ($this->filter) {
            if ($this->active[3]) {
                $models->onlyTrashed();
            } else {
                $models->whereRaw($this->filter);
            }
        }

        return view('crm.livewire.comment-table', [
            'models' => $models->paginate($this->perPage),
            'counts'=>$this->getCommentCounts()
        ]);
    }

    //return comment counts "all" "pending" "approved" "trash"
    public function getCommentCounts() {
        return [
            Comment::select('id')->get()->count(),
            Comment::where('approved',0)->select('id')->count(),
            Comment::where('approved',1)->select('id')->count(),
            Comment::onlyTrashed()->select('id')->count(),
        ];
    }

    //filter comments by all/pending/approved/trash and reset page
    public function filter($query)
    {
        $this->queryFilter = $query;
        $this->active = [false, false, false, false];
        $this->active[$query] = true;
        switch ($query) {
            case 0:
                $this->filter = null;
                break;
            case 1:
                $this->filter = 'approved = 0';
                break;
            case 2:
                $this->filter = 'approved = 1';
                break;
            case 3:
                $this->filter = 'trash';
                break;
        }
        $this->resetPage();

        //request()->query('queryFilter', $this->queryFilter);
    }

    public function approved($id)
    {
        if ($model = $this->model::find($id)) {
            $model->approved = !$model->approved;
            $model->save();
        }
    }

    public function deleteForce($id)
    {
        if ($model = $this->model::withTrashed()->find($id)) {
            $model->forceDelete();
            $this->afterDelete();
        }
    }

    public function answer($id, $parentId, $commentText, $clientId)
    {
        $this->addAnswer($id, $parentId, $commentText, $clientId);
    }

    public function answerPrivate($id, $parentId, $commentText, $clientId)
    {
        $this->addAnswer($id, $parentId, $commentText, $clientId, true);
    }

    protected function setModel()
    {
        $this->model = Comment::class;
    }

    private function addAnswer($id, $parentId, $commentText, $clientId, $private = false)
    {
        $commentRepository = new CommentRepository;
        $comment = $commentRepository->editById($id, [
            'approved' => true
        ]);
        $result = $commentRepository->create([
            'product_id' => $comment->product_id,
            'client_id' => env('COMMENT_ADMIN_ID'),
            'content' => $commentText,
            'parent_id' => $parentId,
            'private' => $private
        ]);

        if ($result) {
            event(new NewCommentAnswer(Client::find($clientId), $comment));
            session()->flash('success', __('Комментарий успешно добавлен!'));
        } else {
            session()->flash('error', __('Произошла ошибка!'));
        }
    }
}
