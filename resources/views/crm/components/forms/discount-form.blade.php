@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.discounts.store']]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.discounts.update', $model->id], 'method' => 'put']) !!}
@endif

{!! Form::label('name', 'Название', ['class' => 'required']); !!}
{!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('name') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('description', 'Описание', ['class' => 'required']); !!}
{!! Form::text('description', $value = old('description'), $attributes = ['class' => 'form-control']) !!}
@error('description') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('size', 'Размер', ['class' => 'required']); !!}
{!! Form::number('size', $value = old('size'), $attributes = ['class' => 'form-control', 'min' =>'0', 'required']) !!}
@error('size') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('type', 'Тип скидки'); !!}
{!! Form::select('type', $discountTypes, old('type'), ['class' => 'form-control']) !!}
@error('type') <x-alert type="error" :message="$message"/> @enderror

<div class="row" style="margin-top: 20px">
    <div class="col-6" style="display: flex; align-items: center">
        {!! Form::label('sw_time_limit', 'Ограничение по времени'); !!}
    </div>
    <div class="col-2">
        {!! Form::checkbox('sw_time_limit', $value = 1, null, ['class' => 'form-control form-custom-checkbox']); !!}
    </div>
</div>

{!! Form::label('start_date', 'Дата начала'); !!}
{!! Form::date('start_date', $value = old('start_date'), ['class' => 'form-control']); !!}

{!! Form::label('end_date', 'Дата окончания'); !!}
{!! Form::date('end_date', $value = old('end_date'), ['class' => 'form-control']); !!}

{!! Form::label('products', 'Продукты', ['class' => 'required']); !!}
{!! Form::select('products[]', $products, old('products'), ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple', 'required']) !!}
@error('products') <x-alert type="error" :message="$message"/> @enderror


<div class="form-button-edit">
    {!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
    {{ link_to_route('crm.discounts.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}
</div>


<br>

{!! Form::close() !!}
