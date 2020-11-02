@php /** @var \App\Models\Comment $comment */ @endphp
<div>
    <div class="d-flex justify-content-center">
        <div class="mb-4 btn-group btn-group-lg" role="group">
            <button wire:click="unsetMyCommentsOnly" type="button" class="mr-0 btn btn-primary {{$onlyMy ? '' : 'active'}}">{{__('Все комментарии')}}</button>
            <button wire:click="setMyCommentsOnly" type="button" class="btn btn-success {{$onlyMy ? 'active' : ''}}">{{__('Только мои комментарии')}}</button>
        </div>
    </div>
    <h2>{{ __('Комментарии:') }}</h2>
    @include('crm.components.flash-message')
    {!! Form::textarea('new-comment', null, ['id' => 'new-comment', 'class' => 'form-control new-comment-input', 'rows' => 6]) !!}
    <br>
    <button id="newComment" class="btn btn-primary btn-lg green">{{__('Отправить')}}</button>
    @foreach($comments as $comment)
        <div class="commReq">

            <div class="row">

                {{--client/comment content--}}
                <div class="{{$comment->private == 1 ? 'col-10' : 'col-12'}}">
                    <b>{{ $comment->client->name }}</b><br>
                    <article>
                        <div class="classicComment">
                            {{ $comment->content }}
                        </div>
                    </article>
                </div>
                @if($comment->private == 1)
                    <div class="col-2">
                        <div class="d-flex justify-content-end">
                            <span class="badge badge-danger">{{__('Приватно')}}</span>
                        </div>
                    </div>
                @endif
            </div>


            @if ($comment->childrenApproved->isNotEmpty())
                @foreach($comment->childrenApproved as $childComment)

                    @if($childComment->isAdminComment())
                    <div class="commRes commResD">
                        <div class="adminAvatar">
                            <img src="{{ asset('img/adminAvatar.jpg') }}" alt="">
                        </div>
                    @else
                        <div class="commRes">
                    @endif
                        {{ __("Данила Деличев") }}
                        <br>

                        <article>
                            {{$childComment->content}}
                        </article>
                    </div>
                @endforeach
            @endif

            <br>
            <button class="btn btn-lg btn-primary" data-toggle="collapse" data-target="#answer-{{$comment->id}}" aria-expanded="false" aria-controls="answer-{{$comment->id}}">
                {{__('Ответить')}}
            </button>
            <div id="answer-{{$comment->id}}" class="collapse">
                <br>
                <div class="form-group field-comments-content">
                    
                    {!! Form::textarea(trans("answer-comment-{$comment->id}"), trans(''), ['id' => "answer-comment-{$comment->id}", 'class' => 'form-control', 'rows' => 6]) !!}
                    <br>
                    {!! Form::button(trans("Отправить комментарий"), ['onclick' => "addComment({$comment->id}, document.getElementById('answer-comment-{$comment->id}').value)", 'id' => "answer-comment-button-{$comment->id}", 'class' => 'btn btn-lg btn-primary green']) !!}

                </div>
            </div>
        </div>
    @endforeach
        </div>
</div>