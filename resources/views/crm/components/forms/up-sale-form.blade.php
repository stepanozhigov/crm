@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.up-sales.store']]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.up-sales.update', $model->id], 'method' => 'put']) !!}
@endif

{!! Form::label('name', 'Название', ['class' => 'required']); !!}
{!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('name') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('product_id', 'Продукт c допродажей', ['class' => 'required']); !!}
{!! Form::select('product_id', $products, old('product_id'), ['class' => 'form-control js-basic-single', 'required']) !!}
@error('product_id') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('additional_product_id', 'Дополнительные продукты', ['class' => 'required']); !!}
{!! Form::select('additional_product_id[]', $products, $model->additionalProducts, ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple', 'required']) !!}
@error('additional_product_id') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('status', 'Статус', ['class' => 'required']); !!}
{!! Form::select('status', [0 => 'Не активный', 1 => 'Активный'], old('status'), ['class' => 'form-control', 'required']) !!}
@error('status') <x-alert type="error" :message="$message"/> @enderror

<br>
{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.up-sales.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
