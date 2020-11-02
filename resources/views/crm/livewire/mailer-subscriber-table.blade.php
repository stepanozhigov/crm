@php /** @var $model \App\Models\ClientMailerlite */ @endphp

<div>
    @include('crm.components.flash-message')
    @include('crm.livewire._part.select-per-page')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id
                <x-sorted-arrows field="id" />
            </th>
            <th scope="col">Клиент</th>
            <th scope="col">mailerlite_client_id</th>
            <th scope="col">Группа</th>
            <th scope="col">Дата подписки
                <x-sorted-arrows field="created_at" />
            </th>
            <th scope="col">Дата обновления
                <x-sorted-arrows field="updated_at" />
            </th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <th scope="row">{{$model->id}}</a></th>
                <td>
                    <p><a href="{{ route('crm.clients.edit', ['client' => $model->client->id]) }}">{{$model->client->email}}</a></p>
                </td>
                <td>{{$model->ml_client_id}}</td>
                <td>{{$model->mailerliteGroup->name}}</td>
                <td>{{$model->created_at}}</td>
                <td>{{$model->updated_at}}</td>

                <td>
                    <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                            wire:click="delete('{{$model->mailerliteGroup->ml_group_id}}', '{{$model->ml_client_id}}')" class="btn btn-danger">Удалить</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $models->links() }}
</div>
