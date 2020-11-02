<?php

namespace App\Http\Livewire\Crm;

use App\Events\NewCommentAnswer;
use App\Models\Project;
use App\Services\Comment\CommentRepository;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Comment;
use App\Services\Comment\CommentService;
use Carbon\Carbon;
use Livewire\WithPagination;

class CommentsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 20;
    public $active = [true, false, false, false];
    public $commentCounts = [0, 0, 0, 0];
    public $filter = null;
    public $queryFilter;
    public $order = 'desc';
    public $orderField = 'id';
    public $model = Comment::class;
    public $comments = [];
    public $content = [];
    public $reply = [];
    public $contentType = [];
    public $contentClass = [];
    public $comment = [];
    public $history = [];

    //filter by project
    //project [id,name]
    public $defaultProjectId = 4;
    public $projects = '';
    public $currentProject = [];

    //filter by comment type
    //currentCommentType = [value=>,name=>]
    public $currentCommentType = [];
    public $commentTypes = [
        'От Всех Клиентов','От Клиентов','От Админа'
    ];

    //view comments on page: all,search
    //currentView = [field=>,name=>]
    public $currentView = [];
    public $views = ['Страницы','Поиск'];

    //search params
    public $searchFields = [
        'id'=>'ID',
        'name'=>'Имя Клиента',
        'email'=>'Почта Клиента',
        'content'=>'Текст Комментария',
        'reply_content'=>'Текст Ответа'
    ];

    //$currentSearchField = [field=>,name=>]
    //$search 0 | 1
    public $currentSearchField = [];
    public $searchValue;
    public $search = 0;

    //reply panel
    public $showReplyPanel = [];
    public $showReplyPrivatePanel = [];

    //edit reply panel
    public $showEditReplyPanel = [];

    //edit comment panel
    public $showEditCommentPanel = [];

    //toggleDeleteCommentPanel
    public $showDeleteCommentPanel = [];

    protected $queryString = [
        'queryFilter' => ['except' => 0],
        'page' => ['except' => 1]
    ];
    protected $listeners = [];

    public function mount(Request $request)
    {

        //get all projects
        $this->getAllProjects();
        $this->setCurrentProject($this->defaultProjectId);

        //set default comment type
        $this->setCurrentCommentType();

        //set current view
        $this->setCurrentView();

        //set current view
        $this->setCurrentSearchField();

        //set search
        $this->setSearch();

        //set sort and direction
        if ($request->sort) {
            $this->orderField = array_key_first($request->sort);
            $this->order = $request->sort[$this->orderField];
        }

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
        //all comment as  per filter
        $comments = $this->getComments();

        return view('crm.livewire.comments-list', [
            'models' => $comments->paginate($this->perPage),
            'counts'=>$this->getCommentCounts()
        ]);
    }

    //close all panels
    public function closeAllPanels($comment_id) {
        $this->showReplyPanel[$comment_id] = false;
        $this->showReplyPrivatePanel[$comment_id] = false;
        $this->showEditReplyPanel[$comment_id] = false;
        $this->showEditCommentPanel[$comment_id] = false;
    }

    //toggle reply panel
    public function toggleReplyPanel($comment_id) {
        if(!isset($this->showReplyPanel[$comment_id])) $this->showReplyPanel[$comment_id] = false;
        if(!$this->showReplyPanel[$comment_id]) {
            $this->closeAllPanels($comment_id);
            $this->showReplyPanel[$comment_id] = true;
        } else {
            $this->showReplyPanel[$comment_id] = false;
        }
    }
    //toggle reply private panel
    public function toggleReplyPrivatePanel($comment_id) {
        if(!isset($this->showReplyPrivatePanel[$comment_id])) $this->showReplyPrivatePanel[$comment_id] = false;
        if(!$this->showReplyPrivatePanel[$comment_id]) {
            $this->closeAllPanels($comment_id);
            $this->showReplyPrivatePanel[$comment_id] = true;
        } else {
            $this->showReplyPrivatePanel[$comment_id] = false;
        }
    }
    //toggle edit reply panel
    public function toggleEditReplyPanel($comment_id) {
        if(!isset($this->showEditReplyPanel[$comment_id])) $this->showEditReplyPanel[$comment_id] = false;
        if(!$this->showEditReplyPanel[$comment_id]) {
            $this->closeAllPanels($comment_id);
            $this->showEditReplyPanel[$comment_id] = true;
        } else {
            $this->showEditReplyPanel[$comment_id] = false;
        }
    }

    //toggle edit comment content panel
    public function toggleEditCommentPanel($comment_id) {
        if(!isset($this->showEditCommentPanel[$comment_id])) $this->showEditCommentPanel[$comment_id] = false;
        if(!$this->showEditCommentPanel[$comment_id]) {
            $this->closeAllPanels($comment_id);
            $this->showEditCommentPanel[$comment_id] = true;
        } else {
            $this->showEditCommentPanel[$comment_id] = false;
        }
    }

    //toggle delete comment content panel
    public function toggleDeleteCommentPanel($comment_id) {
        if(!isset($this->showDeleteCommentPanel[$comment_id])) $this->showDeleteCommentPanel[$comment_id] = false;
        if(!$this->showDeleteCommentPanel[$comment_id]) {
            $this->closeAllPanels($comment_id);
            $this->showDeleteCommentPanel[$comment_id] = true;
        } else {
            $this->showDeleteCommentPanel[$comment_id] = false;
        }
    }

    //
    //PROJECTS
    //
    //get all projects
    public function getAllProjects() {
        $projects = Project::select(['id','name'])->get();
        $this->projects = $projects->toArray();
    }
    //set current project
    public function setCurrentProject($project_id) {
        $this->currentProject = collect($this->projects)->firstwhere('id',$project_id);
        //dd($this->currentProject);
    }
    //get current project
    public function getCurrentProjectId() {
        return $this->currentProject['id'];
    }
    //
    // / PROJECTS
    //

    //
    //Comment Type: all/comment/reply
    //
    public function setCurrentCommentType($value = 1) {
        $this->currentCommentType = [
            'value'=>$value,
            'name'=>$this->commentTypes[$value]
        ];
    }
    public function getCurrentCommentType() {
        return $this->currentCommentType;
    }

    //
    //Comment View: all/search
    //
    public function setCurrentView($value = 0) {
        $this->currentView = [
            'value'=>$value,
            'name'=>$this->views[$value]
        ];
    }
    public function getCurrentView() {
        return $this->currentView;
    }

    //
    //Search Params
    //
    public function setCurrentSearchField($field = 'id') {
        $this->currentSearchField = [
            'field'=>$field,
            'name'=>$this->searchFields[$field]
        ];
        //if($field != 'id') dd($this->currentSearchField);
    }
    public function setSearch($search = 0) {
        if(!empty($this->currentSearchField) && $this->currentSearchField['field'] && $this->searchValue) {
            $this->search = $search;
            $this->resetPage();
        } else {
            $this->search = 0;
        }
    }
    public function unsetSearch() {
        $this->search = 0;
        $this->resetPage();
    }

    //get paginated comments
    public function getComments() {

        //link to project id change
        $projectId = $this->getCurrentProjectId();

        //link Comments to project selection
        $models = Comment::query()
            ->with(['product','client', 'reply', 'replyTo'])
            ->whereHas('product.project', function($query) use ($projectId) {
                $query->where('id',$projectId);
            })
            ->orderBy($this->orderField, $this->order)
            ->where('client_id','!=',env('COMMENT_ADMIN_ID'));

        //link to search params
        if($this->search == 1) {

            //Filter by ID
            if($this->currentSearchField['field'] == 'id') {
                $models->where('id',$this->searchValue);
            }

            //Filter by name
            if($this->currentSearchField['field'] == 'name') {
                $client_name = $this->searchValue;
                $models->whereHas('client',function ($query) use ($client_name) {
                    $query->where('name','like','%'.$client_name.'%');
                });
            }

            //Filter by email
            if($this->currentSearchField['field'] == 'email') {
                $client_email = $this->searchValue;
                $models->whereHas('client',function ($query) use ($client_email) {
                    $query->where('email','like','%'.$client_email.'%');
                });
            }

            //Filter by content
            if($this->currentSearchField['field'] == 'content') {
                $models->where('content','like','%'.$this->searchValue.'%');
            }

            //Filter by reply content
            if($this->currentSearchField['field'] == 'reply_content') {
                $client_reply_content = $this->searchValue;
                $models->whereHas('reply',function ($query) use ($client_reply_content) {
                    $query->where('content','like','%'.$client_reply_content.'%');
                });
            }
        }

        //link Comments to filter selection
        if ($this->filter) {
            if ($this->active[3]) {
                $models->onlyTrashed();
            } else {
                $models->whereRaw($this->filter);
            }
        }

        return $models;
    }

    //return comment counts "all" "pending" "approved" "trash"
    public function getCommentCounts() {

        //start query
        $commentQuery = Comment::query();

        //filter by project
        $projectId = $this->currentProject['id'];
        //filter projects comments
        if($projectId) {
            $commentQuery->whereHas('product.project', function($query) use ($projectId) {
                $query->where('id',$projectId);
            });
        }
        //filter searched comments
        //link to search params
        if($this->search == 1) {

            //search by id
            if($this->currentSearchField['field'] == 'id') {
                $commentQuery->where('id',$this->searchValue);
            }

            //search by name
            if($this->currentSearchField['field'] == 'name') {
                $client_name = $this->searchValue;
                $commentQuery->whereHas('client',function ($query) use ($client_name) {
                    $query->where('name','like','%'.$client_name.'%');
                });
            }

            //search by email
            if($this->currentSearchField['field'] == 'email') {
                $client_email = $this->searchValue;
                $commentQuery->whereHas('client',function ($query) use ($client_email) {
                    $query->where('email','like','%'.$client_email.'%');
                });
            }

            //Filter by content
            if($this->currentSearchField['field'] == 'content') {
                $commentQuery->where('content','like','%'.$this->searchValue.'%');
            }

            //Filter by reply content
            if($this->currentSearchField['field'] == 'reply_content') {
                $client_reply_content = $this->searchValue;
                $commentQuery->whereHas('reply',function ($query) use ($client_reply_content) {
                    $query->where('content','like','%'.$client_reply_content.'%');
                });
            }
        }
        //link to all client's comments
        if($this->currentCommentType['value'] == 0) {
            $commentQuery->where('client_id','>',0);
        }

        //link to client's comments
        if($this->currentCommentType['value'] == 1) {
            $commentQuery->where('client_id','!=',1);
        }
        //link to admin's replies
        elseif ($this->currentCommentType['value'] == 2) {
            $commentQuery->where('client_id',1);
        }

        $allCount = clone $commentQuery;
        $approvedCount = clone $commentQuery;
        $pendingCount = clone $commentQuery;
        $trashedCount = clone $commentQuery;

        return [
            $allCount->select('id')->get()->count(),
            $approvedCount->where('approved',0)->select('id')->count(),
            $pendingCount->where('approved',1)->select('id')->count(),
            $trashedCount->onlyTrashed()->select('id')->count(),
        ];
    }

    //set comments per page
    public function setPerPage($perPage) {
        $this->perPage = $perPage;
        $this->gotoPage(1);
    }

    //update comment content
    public function changeContent($model_id) {
        if(array_key_exists($model_id,$this->content)) {
            if (strlen($this->content[$model_id]) > 0 && $comment = Comment::find($model_id)) {
                $comment->update(['content' => $this->content[$model_id]]);
                $this->comments[$model_id] = $comment;
                unset($this->content[$model_id]);
            }
        }
        //update comments on page
        $this->getComments();
        //close panel
        $this->closeAllPanels($model_id);
    }

    //create reply to comment
    public function createReply($comment_id, $private = 1, $approved = 0) {
        if(array_key_exists($comment_id,$this->reply) && strlen($this->reply[$comment_id]) > 0) {
            $comment = Comment::find($comment_id);
            $reply = Comment::create([
                'product_id'=>$comment->product_id,
                'client_id'=>env('COMMENT_ADMIN_ID'),
                'content'=>$this->reply[$comment_id],
                'approved'=>$approved,
                'private'=>$private,
                'parent_id'=>$comment->id
            ]);
             if($reply) {
                $comment->update(['approved'=>$approved,'private'=>$private]);

                //send email to client from production only
                 if(env('APP_ENV') == 'production') {
                    event(new NewCommentAnswer($comment->client, $comment));
                 }
             }

            //close panel
            $this->closeAllPanels($comment_id);
        }
    }

    //soft delete
    public function delete($comment_id) {
        $comment = Comment::withoutTrashed()->find($comment_id);
        if($comment->reply) {
            $comment->reply->delete();
        }
        $comment->delete();
    }

    //force delete
    public function forceDelete($comment_id) {
        $comment = Comment::withoutTrashed()->find($comment_id);
        if($comment->reply) {
            $comment->reply->forceDelete();
        }
        $comment->forceDelete();
    }

    //set approve
    public function setApprove($comment_id, $approved = 1) {
        if ($comment = Comment::where('id',$comment_id)->with(['reply'])->first()) {
            $comment->approved = $approved;
            $result = $comment->save();
            if($result && $reply = $comment->reply) {
                $reply->update(['approved'=>$approved]);
            }
        }
    }

    //set privacy
    public function setPrivacy($comment_id, $private = 1) {
        if ($comment = Comment::where('id',$comment_id)->with(['reply'])->first()) {
            $comment->private = $private;
            $result = $comment->save();
            if($result && $reply = $comment->reply) {
                $reply->update(['private'=>$private]);
            }
        }
    }

    //check approved status
    public function approved($comment_id):bool
    {
        if ($comment = Comment::find($comment_id)) {
            return $comment->approved == 1 ? true : false;
        }
        return false;
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
    }

    //set content as comment or history
    public function setContentType($comment_id,$type) {
        $this->contentType[$comment_id] = $type;
        $comment = Comment::withoutTrashed()->with('replyTo')->find($comment_id);

        if($this->contentType[$comment_id] == 'comment') {


        }
        elseif($this->contentType[$comment_id] ='history') {

            //Client comment
            if($comment->client_id != env('COMMENT_ADMIN_ID')) {

                //get all comments (by client, product)
                $history_comments = Comment::withoutTrashed()
                        ->with(['reply', 'client'])
                        ->byClient($comment->client_id)
                        ->where('product_id',$comment->product_id)
                        ->orderBy('created_at', 'asc')
                        ->get();
                //dd('Client comment');
            }

            //Admin comment
            else {
                $commentRepliedTo = $comment->replyTo;
                $history_comments = Comment::withoutTrashed()
                    ->with(['reply', 'client'])
                    ->byClient($commentRepliedTo->client_id)
                    ->where('product_id',$commentRepliedTo->product_id)
                    ->orderBy('created_at', 'asc')
                    ->get();

                //dd('Admin comment');
            }

            $this->history[$comment->id] = $history_comments->all();
        }

        //dd($this->contentType);
    }
}
