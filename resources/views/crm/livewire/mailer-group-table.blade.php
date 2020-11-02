@php /** @var $model \App\Models\MailerliteGroup */ @endphp

<div>
    @include('crm.components.flash-message')
    @include('crm.livewire._part.select-per-page')
    <table class="table table-striped">
        <thead>
        <tr class="child-align-top">
            <th scope="col">id
                <x-sorted-arrows field="id" />
            </th>
            <th scope="col">Название
                <p><input wire:model="groupName" type="text" class="table-search-input"></p>
            </th>
            <th scope="col">mailerlite_ID</th>
            <th scope="col">Продукт
                <x-sorted-arrows field="product_name" />
            </th>
            <th scope="col">Тип</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($models as $model)
            <tr>
                <th scope="row">{{$model->id}}</a></th>
                <td>{{$model->name}}</td>
                <td>{{$model->ml_group_id}}</td>
                <td><a href="{{ route('crm.products.edit', ['product' => $model->product_id]) }}">{{$model->product_name}}</a></td>
                <td>{{$model->paid ? 'paid' : 'free'}}</td>

                <td>
                    <a href="{{ route('crm.mailer-groups.edit', ['mailer_group' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
                    <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                            wire:click="delete('{{$model->ml_group_id}}')" class="btn btn-danger">Удалить</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $models->links() }}
</div>
