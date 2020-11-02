@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.mailer-groups.store']]) !!}

    {!! Form::label('product_id', 'Продукт', ['class' => 'required']); !!}
    {!! Form::select('product_id', $products, old('product_id'), ['class' => 'form-control js-basic-single', 'required']) !!}
    @error('product_id') <x-alert type="error" :message="$message"/> @enderror

    {!! Form::label('paid', 'Тип', ['class' => 'required']); !!}
    {!! Form::select('paid', [0 => 'free', 1 => 'paid'], old('paid'), ['class' => 'form-control', 'required']) !!}
    @error('paid') <x-alert type="error" :message="$message"/> @enderror

@else
    {!! Form::model($model, ['route' => ['crm.mailer-groups.update', $model->id], 'method' => 'put']) !!}
@endif

{!! Form::label('name', 'Название (генерируется автоматически)'); !!}
{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
@error('name') <x-alert type="error" :message="$message"/> @enderror

<br>
{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.mailer-groups.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
