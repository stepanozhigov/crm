@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.tags.store']]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.tags.update', $model->id], 'method' => 'put']) !!}
@endif

{!! Form::label('name', 'Название', ['class' => 'required']); !!}
{!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('name') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('status', 'Статус', ['class' => 'required']); !!}
{!! Form::select('status', [0 => 'Не активный', 1 => 'Активный'], null, $attributes = ['class' => 'form-control', 'required']) !!}
@error('status') <x-alert type="error" :message="$message"/> @enderror

<div class="form-control mt-4">
    {!! Form::hidden('is_ml', 0) !!}
    {!! Form::checkbox('is_ml', 1, $value = old('is_ml'), $attributes = ['id' => 'is_ml']) !!}
    {!! Form::label('is_ml', 'MailerRite'); !!}
    @error('is_ml') <x-alert type="error" :message="$message"/> @enderror
</div>

<br>
{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.tags.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
