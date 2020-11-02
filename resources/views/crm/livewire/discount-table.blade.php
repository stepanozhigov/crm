@php /** @var $model \App\Models\Discount */ @endphp

<div>
    @include('crm.components.flash-message')
    @include('crm.livewire._part.edit-field-modal')
    @include('crm.livewire._part.select-per-page')
    <table id="sortTable" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id
                <x-sorted-arrows field="id" />
            </th>
            <th scope="col">Название
                <x-sorted-arrows field="name" />
            </th>
            <th scope="col">Описание</th>
            <th scope="col">Размер</th>
            <th scope="col">Тип</th>
            <th scope="col">Огр. по времени</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($models as $model)
            <tr>
                <th scope="row">{{$model->id}}</th>
                <td class="editableField" wire:click="editInput('{{$model->name}}', 'name', {{$model->id}})">{{$model->name}}</td>
                <td class="editableField" wire:click="editInput('{{$model->description}}', 'description', {{$model->id}})">{{$model->description}}</td>
                <td>{{$model->size}}</td>
                <td>{{ \App\Helpers\DiscountHelper::getDiscountTypeName($model->type)}}</td>
                <td>{!! \App\Helpers\FormHelper::getLabelYesOrNo($model->sw_time_limit) !!}</td>
                <td>
                    <a href="{{ route('crm.discounts.edit', ['discount' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
                    <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                            wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
</div>

