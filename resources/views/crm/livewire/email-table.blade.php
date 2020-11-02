@php /** @var $model \App\Models\Email */ @endphp

<div>
    @include('crm.components.flash-message')
    @include('crm.livewire._part.select-per-page')
    <table class="table table-striped">
        <thead>
        <tr class="child-align-top">
            <th scope="col">id
                <x-sorted-arrows field="id" />
            </th>
            <th scope="col">Клиент</th>
            <th scope="col">Email
                <p><input wire:model.lazy="email" type="text" class="table-search-input form-control"></p>
            </th>
            <th scope="col">Тема</th>
            <th scope="col">Дата отправки</th>
            <th scope="col">Статус</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($models as $model)
            <tr>
                <th scope="row">{{$model->id}}</th>
                @if ($model->client !== null)
                    <td><a href="{{ route('crm.clients.edit', ['client' => $model->client->id]) }}">{{$model->client->name}}</a></td>
                @else
                    <td class="text-secondary">Пользователь удален</td>
                @endif
                <td>{{$model->email}}</td>
                <td>{{$model->subject}}</td>
                <td>{{$model->created_at}}</td>
                <td>{!! \App\Helpers\FormHelper::getLabelActive($model->status) !!}</td>
                <td>
                    <a href="{{ route('crm.emails.show', ['email' => $model->id]) }}" class="btn btn-secondary">Посмотреть</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
</div>

