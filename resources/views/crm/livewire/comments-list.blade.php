@php //dd($models) @endphp
@php //print_r($perPage) @endphp

<div class="">
    <div class="row">

        {{--    FILTER    --}}
        <div class="col-12">

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center mb-4">
                        {{--    Project   --}}
                        <div class="dropdown mr-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="projectsDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$currentProject['name']}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="projectsDropdownMenuButton">
                                @foreach($projects as $project)
                                    <a class="dropdown-item" href="#" wire:click.prevent="setCurrentProject({{$project['id']}})">{{$project['name']}}</a>
                                @endforeach
                            </div>
                        </div>
                        {{--  /  Project   --}}

                        {{--    All / Search   --}}
                        <div class="btn-group" role="group" aria-label="First group">
                            @foreach($views as $i=>$view)
                            <button type="button" class="btn btn-info {{$currentView['value'] == $i ? 'active' : ''}}" wire:click.prevent="setCurrentView({{$i}})">{{$view}}</button>
                            @endforeach
                        </div>
                        {{--  /  All / Search   --}}
                    </div>
                </div>

                {{--    FILTER    --}}
                <div class="col-12">
                    <div class="d-flex justify-content-center mb-4">

                        <div class="btn-group" role="group" aria-label="button group">

                            <a href="#" wire:click.prevent="filter(0)" class="btn btn-primary {{ $active[0] ? 'active' : '' }}">
                                Все
                                <span class="badge badge-light ml-2">{{$counts[0]}}</span>
                            </a>
                            <a href="#" wire:click.prevent="filter(1)" class="btn btn-warning {{ $active[1] ? 'active' : '' }}">
                                Ожидающие
                                <span class="badge badge-light ml-2">{{$counts[1]}}</span>
                            </a>
                            <a href="#" wire:click.prevent="filter(2)" class="btn btn-success {{ $active[2] ? 'active' : '' }}">
                                Одобренные
                                <span class="badge badge-light ml-2">{{$counts[2]}}</span>
                            </a>
                            <a href="#" wire:click.prevent="filter(3)" class="btn btn-danger {{ $active[3] ? 'active' : '' }}">
                                Корзина
                                <span class="badge badge-light ml-2">{{$counts[3]}}</span>
                            </a>
                        </div>

                    </div>
                </div>
                {{-- /  FILTER    --}}

            </div>

        </div>
        {{--  /  FILTER    --}}

        {{--    PAGINATOR / SEARCH    --}}
        @if($currentView['value'] == 0)
            <div class="col-12">
            <div class="d-flex justify-content-center mb-4">
                <button wire:click.prevent="previousPage" type="button" class="btn btn-info" {{ $models->onFirstPage() ? 'disabled' : ''}}>Предыдущая страница</button>
                <span class="mx-2"></span>
                {{--         Select Per Page        --}}
                <div class="dropdown">
                    <a href="#" class="btn btn-info dropdown-toggle" type="button" id="perPageDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>{{$perPage}}</span> на странице
                    </a>
                    <div class="dropdown-menu" aria-labelledby="perPageDropdownMenuButton">
                        <a class="dropdown-item" href="#" wire:click.prevent="setPerPage(10)">10 на странице</a>
                        <a class="dropdown-item" href="#" wire:click.prevent="setPerPage(20)">20 на странице</a>
                        <a class="dropdown-item" href="#" wire:click.prevent="setPerPage(50)">50 на странице</a>
                    </div>
                </div>
                {{--         / Select Per Page        --}}
                <span class="mx-2"></span>
                <button wire:click.prevent="nextPage()" type="button" class="btn btn-info" {{ !$models->hasMorePages() ? 'disabled' : ''}}>Следующая страница</button>
            </div>
        </div>
        {{--  /  PAGINATOR    --}}
        {{--    SEARCH    --}}
        @elseif($currentView['value'] == 1)
            <div class="col-12">
                <div class="row">
                    <div class="offset-4 col-4">
                        <div class="mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-info {{$search == 1 ? 'active' : ''}}" wire:click="setSearch(1)">{{$currentSearchField['name']}}</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach($searchFields as $field=>$name)
                                            <a class="dropdown-item" href="#" wire:click.prevent="setCurrentSearchField('{{$field}}')">{{$name}}</a>
                                        @endforeach
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" wire:click="setSearch(0)">Отменить</a>
                                    </div>
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" wire:model.lazy="searchValue">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{--   / PAGINATOR / SEARCH    --}}
    </div>

    {{--    PAGES    --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex">
            {{--           Pagination info         --}}
            <p class="m-0 p-0">Страница {{$models->currentPage()}} из {{$models->lastPage()}}</p>
            <span class="mx-2"></span>
            {{--           / Pagination info         --}}
        </div>
    </div>
    {{--  /  PAGES    --}}

    @foreach($models as $comment)
        @php //if(!$comment->reply) dd($comment); @endphp
        {{--  model  --}}
        <div id="model-{{$comment->id}}" class="{{$comment->approved == 1 ? 'crm-comment-approved' : 'crm-comment-pending'}} row mb-4 bg-white border p-2 rounded shadow-sm">

            {{-- mass/client/product/date --}}
            <div class="col-12">
                <div class="row mb-4">
                    {{--mass group action checkbox--}}
                    <div class="col-12 col-lg-1 border-left comment-group d-flex justify-content-center align-items-center py-4">
                        <input type="checkbox" name="mass_group[]" value="{{$comment->id}}">
                    </div>
                    {{-- / mass group action checkbox--}}

                    {{--client--}}
                    <div class="col-12 col-lg-3 border-left comment-client">
                        <div class="row">
                            <div class="col-3 col-lg-12 pb-1 font-weight-bold">
                                Клиент
                            </div>
                            <div class="col-9 col-lg-12 pb-1">
                                <p>{{$comment->client->name}} | {{$comment->client->email}}</p>
                            </div>
                        </div>
                    </div>
                    {{-- / client--}}

                    {{--product--}}
                    <div class="col-12 col-lg-6 border-left comment-product">
                        <div class="row">
                            <div class="col-3 col-lg-12 font-weight-bold pb-1">
                                Продукт
                            </div>
                            <div class="col-9 col-lg-12 pb-1">
                                <p>{{$comment->product->name}}</p>
                            </div>
                        </div>
                    </div>
                    {{-- / product--}}

                    {{--date--}}
                    <div class="col-12 col-lg-2 border-left comment-date">
                        <div class="row">
                            <div class="col-3 col-lg-12 font-weight-bold pb-1">
                                Дата
                            </div>
                            <div class="col-9 col-lg-12 pb-1">
                                <p>{{ \App\Helpers\DateHelper::getDateHuman($comment->created_at) }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- / date--}}
                </div>
            </div>

            {{-- Content --}}
            <div class="col-12">

                {{-- STOP USING --}}
                <div class="mb-4 d-flex justify-content-between">

                    {{-- content type pills --}}
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a href="#"
                               class="nav-link {{empty($contentType) || !isset($contentType[$comment->id]) || (array_key_exists($comment->id,$contentType) && $contentType[$comment->id] =='comment') ? 'active' : ''}}"
                               wire:click.prevent="setContentType({{$comment->id}},'comment')">
                                {{ $comment->client->id != env('COMMENT_ADMIN_ID') ? 'Комментарий' : 'Комментарий'}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                               class="nav-link {{array_key_exists($comment->id,$contentType) && $contentType[$comment->id]=='history' ? 'active' : ''}}"
                               wire:click.prevent="setContentType({{$comment->id}},'history')">История</a>
                        </li>
                    </ul>
                    {{-- / content type pills --}}
                </div>

                {{-- content by content type--}}
                <div class="row">

                    {{-- comment content--}}
                    @if(empty($contentType) || !isset($contentType[$comment->id]) ||(isset($contentType[$comment->id]) && $contentType[$comment->id]=='comment'))
                    <div class="col-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-2 col-md-1">
                                        {{--svg comment status--}}
                                        <div class="row">
                                            {{--status(approved)--}}
                                            <div class="col-6 p-0">
                                                @if($comment->approved)
                                                    <div class="bg-success p-1">
                                                        <svg viewBox="0 0 20 20" fill="currentColor" class="thumb-up w-6 h-6 text-white"><path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path></svg>
                                                    </div>
                                                @else
                                                    <div class="bg-warning p-1">
                                                        <svg viewBox="0 0 20 20" fill="currentColor" class="clock w-6 h-6 text-white"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                @endif
                                            </div>
                                            {{--status(private)--}}
                                            <div class="col-6 p-0">
                                                @if($comment->private)
                                                    <div class="bg-danger p-1">
                                                        <svg viewBox="0 0 20 20" fill="currentColor" class="text-white lock-closed w-6 h-6"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                @else
                                                    <div class="bg-primary p-1">
                                                        <svg viewBox="0 0 20 20" fill="currentColor" class="text-white lock-open w-6 h-6"><path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"></path></svg>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- / svg comment status--}}
                                    </div>
                                    <div class="col-10 col-md-11">
                                        <div class="border p-2 pl-4 rounded shadow-sm mb-4">
                                            <h6 class="text-muted">Комменарий #{{$comment->id}}</h6>
                                            <div>
                                                {{$comment->content}}
                                            </div>
                                        </div>
                                        @if($comment->reply)
                                            <div class="row">
                                                <div class="offset-1 col-11 mb-4">
                                                    <div class="border p-2 pl-4 rounded shadow-sm">
                                                        <h6 class="text-muted">Ответ #{{$comment->reply->id}}</h6>
                                                        {{$comment->reply->content}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- / comment content--}}

                    {{-- history content--}}
                    @elseif(isset($contentType[$comment->id]) && $contentType[$comment->id]=='history')
                    <div class="col-12">
                    @if(array_key_exists($comment->id,$history))
                        <div class="row">
                            @foreach($history[$comment->id] as $historyComment)
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1">

                                        </div>
                                        <div class="col-11">
                                            <div class="border p-3 mb-3 rounded shadow-sm {{ $historyComment['id'] == $comment->id ? 'bg-secondary text-white' : '' }}">
                                                <div class="d-flex justify-content-between  {{ $historyComment['id'] == $comment->id ? 'text-white' : 'text-muted' }}">
                                                    <p>Комментарий #{{$historyComment['id']}}</p>
                                                    <span>{{ \Carbon\Carbon::parse($historyComment['created_at'])->subMinutes(1)->diffForHumans() }}</span>
                                                </div>
                                                <p class="{{ $historyComment['id'] == $comment->id ? 'font-weight-bold' : '' }}">{{$historyComment['content']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($historyComment['reply'])
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1 offset-1">
                                        </div>
                                        <div class="col-10">
                                            <div class="border p-3 mb-3 rounded shadow-sm {{ $comment->reply && $historyComment['reply']['id'] == $comment->reply->id ? 'bg-secondary text-white' : '' }}">
                                                <div class="d-flex justify-content-between {{ $comment->reply && $historyComment['reply']['id'] == $comment->reply->id ? 'text-white' : 'text-muted' }}">
                                                    <p>Ответ #{{$historyComment['reply']['id']}}</p>
                                                    <span>{{ \Carbon\Carbon::parse($historyComment['reply']['created_at'])->subMinutes(1)->diffForHumans() }}</span>
                                                </div>
                                                <p class="{{ $historyComment['reply']['id'] == $comment->id ? 'font-weight-bold' : '' }}">{{$historyComment['reply']['content']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    </div>
                    @endif
                    {{-- / history content--}}
                </div>
                {{-- / content by content type--}}
            </div>
            {{-- / Content --}}

            {{-- NEW CRM btns--}}
            <div class="col-12">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2 mb-4" role="group" aria-label="First group">
                        @if(!$comment->reply)
                            <button type="button" class="btn btn-info {{ isset($showReplyPanel[$comment->id]) && $showReplyPanel[$comment->id] ? 'active' : '' }}" wire:click="toggleReplyPanel({{$comment->id}})">Ответить и Одобрить</button>
                            <button type="button" class="btn btn-info {{ isset($showReplyPrivatePanel[$comment->id]) && $showReplyPrivatePanel[$comment->id] ? 'active' : '' }}" wire:click="toggleReplyPrivatePanel({{$comment->id}})">Ответить и Одобрить Приватно</button>
                        @elseif($comment->reply)
                            <button type="button" class="{{'edit-'.$comment->reply->id.'-panel'}} btn btn-info {{ isset($showEditReplyPanel[$comment->id]) && $showEditReplyPanel[$comment->id] ? 'active' : '' }}" wire:click="toggleEditReplyPanel({{$comment->id}})">Редактировать Ответ</button>
                        @endif
                    </div>
                    <div class="btn-group mr-2  mb-4" role="group" aria-label="Second group">
                        @if(!$comment->approved)
                            <button type="button" class="btn btn-success" wire:click.prevent="setApprove({{$comment->id}},1)">Одобрить</button>
                        @elseif($comment->approved)
                            <button type="button" class="btn btn-warning" wire:click.prevent="setApprove({{$comment->id}},0)">Ожидание</button>
                        @endif
                        @if(!$comment->private)
                            <button type="button" class="btn btn-danger" wire:click.prevent="setPrivacy({{$comment->id}},1)">Приватно</button>
                        @elseif($comment->private)
                            <button type="button" class="btn btn-primary" wire:click.prevent="setPrivacy({{$comment->id}},0)">Публично</button>
                        @endif
                    </div>
                    <div class="btn-group mr-2 mb-4" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-info {{ isset($showEditCommentPanel[$comment->id]) && $showEditCommentPanel[$comment->id] ? 'active' : '' }}" wire:click.prevent="toggleEditCommentPanel({{$comment->id}})">Изменить</button>
                        <button type="button" class="btn btn-danger {{isset($showDeleteCommentPanel[$comment->id]) && $showDeleteCommentPanel[$comment->id] ? 'active' : '' }}" wire:click.prevent="toggleDeleteCommentPanel({{$comment->id}})">Удалить</button>
                    </div>
{{--                    <div class="btn-group mb-4" role="group" aria-label="Fourth group">--}}
{{--                        <button type="button" class="btn btn-secondary">История</button>--}}
{{--                        <button type="button" class="btn btn-secondary">Ссылка</button>--}}
{{--                    </div>--}}
                </div>
            </div>
            {{--  / NEW CRM btns--}}

            {{-- NEW CRM reply panel--}}
            @if((isset($showReplyPanel[$comment->id]) && $showReplyPanel[$comment->id]) || (isset($showReplyPrivatePanel[$comment->id]) && $showReplyPrivatePanel[$comment->id]))
                <div class="col-12">
                    <textarea class="w-100 mb-2" rows="7" wire:model.lazy="reply.{{$comment->id}}"></textarea>
                    @if(isset($showReplyPanel[$comment->id]) && $showReplyPanel[$comment->id])
                        <button type="button" class="btn btn-success mb-2" wire:click.prevent="createReply({{$comment->id}},0,1)">Отправить</button>
                    @elseif(isset($showReplyPrivatePanel[$comment->id]) && $showReplyPrivatePanel[$comment->id])
                        <button type="button" class="btn btn-success mb-2" wire:click.prevent="createReply({{$comment->id}},1,1)">Отправить приватно</button>
                    @endif
                </div>
            @endif
            {{--  / NEW CRM reply panel--}}

            {{-- NEW CRM edit reply panel--}}
            @if(isset($showEditReplyPanel[$comment->id]) && $showEditReplyPanel[$comment->id])
                <div class="col-12">
                    @if($comment->reply)
                        <textarea class="w-100 mb-2" rows="7" wire:model.lazy="content.{{$comment->reply->id}}">{{$comment->reply->content}}</textarea>
                        <button type="button" class="btn btn-success mb-2" wire:click.prevent="changeContent({{$comment->reply->id}})">Сохранить</button>
                        <button type="button" class="btn btn-danger mb-2" wire:click.prevent="forceDelete({{$comment->reply->id}})">Удалить</button>
                    @endif
                </div>
            @endif
            {{--  / NEW CRM edit reply panel--}}

            {{-- NEW CRM edit comment content panel--}}
            @if(isset($showEditCommentPanel[$comment->id]) && $showEditCommentPanel[$comment->id])
                <div class="col-12">
                    <textarea class="w-100 mb-2" rows="7" wire:model.lazy="content.{{$comment->id}}">{{$comment->content}}</textarea>
                    <button type="button" class="btn btn-success mb-2" wire:click.prevent="changeContent({{$comment->id}})">Сохранить</button>
                </div>
            @endif
            {{--  / NEW CRM edit reply panel--}}

            {{-- NEW CRM delete comment content panel--}}
            @if(isset($showDeleteCommentPanel[$comment->id]) && $showDeleteCommentPanel[$comment->id])
                <div class="col-12">
                    <div class="d-flex justify-content-start mb-4">
                        <button type="button" wire:click="delete({{$comment->id}})" class="text-white btn btn-warning">Корзина</button>
                        <div class="mx-1"></div>
                        <button type="button" wire:click="forceDelete({{$comment->id}})" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
            @endif
            {{--  / NEW CRM delete reply panel--}}

        </div>
        {{-- / model  --}}
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $models->links() }}
    </div>
</div>