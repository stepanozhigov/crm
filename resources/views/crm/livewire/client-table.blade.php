@php /** @var $model \App\Models\Client */ @endphp

<div>
    @include('crm.components.flash-message')
    @include('crm.livewire._part.edit-field-modal')
    @include('crm.livewire._part.select-per-page')
    <table class="table table-striped">
        <thead>
        <tr class="child-align-top">
            <th scope="col">id
                <x-sorted-arrows field="id" />
            </th>
            <th scope="col">Login
                <p><input wire:model.lazy="name" type="text" class="table-search-input form-control"></p>
            </th>
            <th scope="col">Email
                <p><input wire:model.lazy="email" type="text" class="table-search-input form-control"></p>
            </th>
            <th scope="col">Статус
                <p><select wire:model="status" type="text" class="table-search-input form-control">
                        <option  selected="selected" value="-1">--</option>
                        <option value="0">неактивный</option>
                        <option value="10">активный</option>
                    </select></p>
            </th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
        <tr>
            <th scope="row"><a href="{{ route('crm.clients.edit', ['client' => $model->id]) }}">{{$model->id}}</a></th>
            <td class="editableField" wire:click="editInput('{{$model->name}}', 'name', {{$model->id}})">{{$model->name}}</td>
            <td>{{$model->email}}</td>
            <td>{!! \App\Helpers\UserHelper::getStatusLabel($model->status) !!}</td>

            <td>
                <a href="{{ route('crm.clients.edit', ['client' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
                <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                        wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $models->links() }}
</div>
