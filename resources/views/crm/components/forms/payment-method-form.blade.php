@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.payment-methods.store'], 'files' => true]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.payment-methods.update', $model->id], 'files' => true,'method' => 'put']) !!}
@endif

{!! Form::label('name', 'Название', ['class' => 'required']); !!}
{!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('name') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('title', 'Заголовок'); !!}
{!! Form::text('title', $value = old('title'), $attributes = ['class' => 'form-control']) !!}
@error('title') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('description', 'Описание'); !!}
{!! Form::text('description', $value = old('description'), $attributes = ['class' => 'form-control']) !!}
@error('description') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('status', 'Статус'); !!}
{!! Form::select('status', $statuses, old('description'), $attributes = ['class' => 'form-control']) !!}
@error('status') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('commission', 'Комиссия'); !!}
{!! Form::text('commission', $value = old('commission'), $attributes = ['class' => 'form-control']) !!}
@error('commission') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('maturity_of_money', 'Время зачисления'); !!}
{!! Form::text('maturity_of_money', $value = old('maturity_of_money'), $attributes = ['class' => 'form-control']) !!}
@error('maturity_of_money') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('content_page', 'Контент страницы'); !!}
{!! Form::textarea('content_page', $value = old('content_page'), $attributes = ['class' => 'form-control', 'id' => 'ckeditor']) !!}
@error('content_page') <x-alert type="error" :message="$message"/> @enderror

<div class="row" style="margin-top: 20px">
    <div class="col-6" style="display: flex; align-items: center">
        {!! Form::label('logo', 'Логотип'); !!}
    </div>
    <div class="col-2">
        @if($model->logo)
            <img src="/{{ $model->logo}}" alt="">
        @endif
    </div>
    <div class="col-2">
        {!! Form::file('logo') !!}
    </div>
</div>
@error('logo') <x-alert type="error" :message="$message"/> @enderror



<br>
{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.payment-methods.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
