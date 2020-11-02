@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.projects.store']]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.projects.update', $model->id], 'method' => 'put']) !!}
@endif
{!! Form::label('name', 'Название', ['class' => 'required']); !!}
{!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('name') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('domain', 'Домен', ['class' => 'required']); !!}
{!! Form::text('domain', $value = old('domain'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('domain') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('language', 'Язык', ['class' => 'required']); !!}
{!! Form::text('language', $value = old('language'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('language') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('currency', 'Валюта', ['class' => 'required']); !!}
{!! Form::select('currency', App\Helpers\CurrencyHelper::getCurrenciesList(), null, ['class' => 'form-control', 'required']) !!}
@error('currency') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('paymentMethods', 'Методы оплаты'); !!}
{!! Form::select('paymentMethods[]', $paymentMethods,  null, ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}

<br>
<br>

{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.projects.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
