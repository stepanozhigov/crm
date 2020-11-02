@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.webinars.store'], 'id' => 'webinar-form']) !!}
@else
    {!! Form::model($model, ['route' => ['crm.webinars.update', $model->slug], 'method' => 'put', 'id' => 'webinar-form']) !!}
@endif

{!! Form::label('name', 'Имя', ['class' => 'required']); !!}
{!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('name') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('slug', 'Слаг', ['class' => 'required']); !!}
{!! Form::text('slug', $value = old('slug'), $attributes = ['class' => 'form-control', 'required']) !!}
@error('slug') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('page_title', 'Заголовок страницы'); !!}
{!! Form::text('page_title', $value = old('page_title'), $attributes = ['class' => 'form-control']) !!}
@error('page_title') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('title', 'Заголовок1'); !!}
{!! Form::text('title', $value = old('title'), $attributes = ['class' => 'form-control']) !!}
@error('title') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('description', 'Заголовок2'); !!}
{!! Form::text('description', $value = old('description'), $attributes = ['class' => 'form-control']) !!}
@error('description') <x-alert type="error" :message="$message"/> @enderror


{!! Form::label('video_frame', 'Видео фрейм', ['class' => 'required']); !!}
{!! Form::textarea('video_frame', $value = old('slug'), $attributes = ['class' => 'form-control', 'required', 'rows' => 3]) !!}
@error('video_frame') <x-alert type="error" :message="$message"/> @enderror

{!! Form::label('buttons', 'Кнопки'); !!}
<div id="code">
</div>

{!! Form::textarea('buttons', $value = old('buttons'), $attributes = ['style' => 'display: none',  'class' => 'form-control', 'rows' => 3]) !!}
@error('buttons') <x-alert type="error" :message="$message"/> @enderror
<br>
{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.webinars.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
