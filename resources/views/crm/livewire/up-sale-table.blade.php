@php /** @var $model \App\Models\UpSale */ @endphp

<div>
    @include('crm.components.flash-message')
    @include('crm.livewire._part.edit-field-modal')
    @include('crm.livewire._part.select-per-page')
    <table id="sortTable" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Продукт допродажи</th>
            <th scope="col">Статус</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($models as $model)
            <tr>
                <th scope="row">{{$model->id}}</th>
                <td>{{$model->name}}</td>
                <td>{{$model->product->name}}</td>
                <td>{!! \App\Helpers\FormHelper::getLabelActive($model->status) !!}</td>

                <td>
                    <a href="{{ route('crm.up-sales.edit', ['up_sale' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
                    <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                            wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
</div>

