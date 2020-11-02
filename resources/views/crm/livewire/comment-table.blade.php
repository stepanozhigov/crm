@php /** @var $models[] (paginated) \App\Models\Comment */ @endphp
@php /** @var $counts ['all','pending','approved','trashed'] */ @endphp

@php //dd($models->onFirstPage()) @endphp
@php //dd($models) @endphp
@php //print_r($perPage) @endphp

<div>
    <div class="d-flex justify-content-between">
        <div class="w-100 d-flex flex-column mb-0">

            {{--    FILTER    --}}
            <div class="btn-group btn-group-lg mb-4" role="group" aria-label="Large button group">

                <a href="#" wire:click.prevent="filter(0)" class="btn btn-primary {{ $active[0] ? 'active' : '' }}">
                    Все
                    <span class="badge badge-light ml-2">{{$counts[0]}}</span>
                </a>
                <a href="#" wire:click.prevent="filter(1)" class="btn btn-primary {{ $active[1] ? 'active' : '' }}">
                    Ожидающие
                    <span class="badge badge-light ml-2">{{$counts[1]}}</span>
                </a>
                <a href="#" wire:click.prevent="filter(2)" class="btn btn-primary {{ $active[2] ? 'active' : '' }}">
                    Одобренные
                    <span class="badge badge-light ml-2">{{$counts[2]}}</span>
                </a>
                <a href="#" wire:click.prevent="filter(3)" class="btn btn-primary {{ $active[3] ? 'active' : '' }}">
                    Корзина
                    <span class="badge badge-light ml-2">{{$counts[3]}}</span>
                </a>
            </div>

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

            {{--    PAGINATOR CONTROL    --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                    <div class="d-flex">
                        {{--           Pagination info         --}}
                        <p class="m-0 p-0">Страница {{$models->currentPage()}} из {{$models->lastPage()}}</p>
                        <span class="mx-2"></span>
                        {{--           / Pagination info         --}}
                    </div>

            </div>
        </div>
    </div>

    @include('crm.components.flash-message')
    @include('crm.livewire._part.edit-field-modal')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Клиент</th>
                <th scope="col">Продукт</th>
                <th scope="col">Текст</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата обновления</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                Столбец #1: ID
                <th scope="row">{{$model->id}}</th>
                Столбец #1: Клиент
                <td>
                    <p>{{$model->client->name}}</p>
                    <p>{{$model->client->email}}</p>
                </td>
                <td>{{$model->product->name}}</td>
                <td class="editableField" wire:click="editInput('{{$model->content}}', 'content', {{$model->id}})">{{ Str::limit($model->content, 200)}}</td>
                <td>{{ \App\Helpers\DateHelper::getDateHuman($model->created_at) }}</td>
                <td>{{ \App\Helpers\DateHelper::getDateHuman($model->updated_at) }}</td>
                <td>
                    <div>
                    <button data-toggle="collapse" data-target="#answer-block-{{$model->id}}" aria-expanded="false" aria-controls="answer-block-{{$model->id}}" class="btn btn-success">Ответить</button>
                    <a href="{{ route('crm.comments.edit', ['comment' => $model->id]) }}" target="_blank" class="btn btn-primary">История</a>

                    @if($model->approved)
                        <button wire:click="approved({{$model->id}})" class="btn btn-secondary">В ожидание</button>
                    @else
                        <button wire:click="approved({{$model->id}})" class="btn btn-success">Одобрить</button>
                    @endif

                    @if ($model->trashed())
                        <button onclick="confirm('Уверены что хотите удалить навсегда?') || event.stopImmediatePropagation()"
                                wire:click="deleteForce({{$model->id}})" class="btn btn-danger">Удалить</button>
                    @else
                        <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                            wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
                    @endif
                    </div>
                    <div class="row mt-3 collapse" id="answer-block-{{$model->id}}">
                        <div class="col-6">
                            <textarea class="form-control" id="answer-{{$model->id}}" cols="40" rows="3">
                            </textarea>
                        </div>
                        <div class="col-6">
                            <button onclick="answer({{$model->id}}, {{$model->parent_id ?? $model->id}}, {{$model->client_id}})" class="btn btn-primary mb-2">Ответить</button>
                            <br>
                            <button onclick="answerPrivate({{$model->id}}, {{$model->parent_id ?? $model->id}}, {{$model->client_id}})" class="btn btn-primary">Ответить приватно</button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $models->links() }}
</div>
