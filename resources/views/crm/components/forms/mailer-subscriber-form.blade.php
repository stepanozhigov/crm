@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.mailer-subscribers.store']]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.mailer-subscribers.update', $model->id], 'method' => 'put']) !!}
@endif

{!! Form::label('client_id', 'Клиент', ['class' => 'required']); !!}
{!! Form::select('client_id', $clients, old('client_id'), ['class' => 'form-control js-basic-single', 'required']) !!}
@error('client_id') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('mailerlite_group_id', 'Группа', ['class' => 'required']); !!}
{!! Form::select('mailerlite_group_id', $groups, old('mailerlite_group_id'), ['class' => 'form-control js-basic-single', 'required']) !!}
@error('mailerlite_group_id') <x-alert type="error" :message="$message"/> @enderror

<br>
<br>
{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.mailer-subscribers.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
