@php /** @var \App\Models\Comment $comment */ @endphp
@php //dd($comment) @endphp
<div>
    <h2>{{ __('Комментарий:') }}</h2>
    @include('crm.components.flash-message')
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <button class="btn btn-lg btn-primary" data-toggle="collapse" data-target="#answer-{{$comment->id}}" aria-expanded="false" aria-controls="answer-{{$comment->id}}">Ответить</button>
            </div>
        </div>
        <div class="col-12">
            <div id="answer-{{$comment->id}}" class="collapse">
                <div class="form-group field-comments-content">
                    <textarea class="w-100" rows="10" wire:model.lazy="content"></textarea>
                    <button class="btn btn-success" wire:click.prevent="addComment">Отправить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="commReq shadow-sm">
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
                        <span class="badge badge-danger">Приватно</span>
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
                    {{ $childComment->client->name }}
                    <br>

                    <article>
                        {{$childComment->content}}
                    </article>
                </div>
            @endforeach
        @endif
    </div>
</div>
</div>