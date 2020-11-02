@php /** @var $model \App\Models\Product */ @endphp

<div>
    @include('crm.components.flash-message')
    @include('crm.livewire._part.edit-field-modal')
    @include('crm.livewire._part.select-per-page')
    <table id="sortTable" class="table table-striped">
        <thead>
        <tr class="child-align-top">
            <th scope="col">id
                <x-sorted-arrows field="id" />
            </th>
            <th scope="col">Название
                <p><input wire:model.lazy="productName" type="text" class="table-search-input form-control"></p>
            </th>
            <th scope="col">Проект
                <p><input wire:model.lazy="projectName" type="text" class="table-search-input form-control"></p>
            </th>
            <th scope="col">Тип
                <p>
                    {!! Form::select('', $productTypesList, 0, ['class' => 'table-search-input form-control', 'wire:model' => 'type']) !!}
                </p>
            </th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($models as $model)
        <tr>
            <th scope="row">{{$model->id}}</th>
            <td class="editableField" wire:click="editInput('{{$model->name}}', 'name', {{$model->id}})">{{$model->name}}</td>
            <td>{{$model->project_name}}</td>
            <td>{{ \App\Helpers\ProductHelper::getTypeLabel($model->type) }}</td>
            <td class="editableField" wire:click="editInput({{$model->price}}, 'price', {{$model->id}})">{{$model->price}}</td>
            <td>
                <a href="{{ route('crm.products.edit', ['product' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
                <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                        wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
</div>

