@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.products.store'], 'id' => 'product-form']) !!}
@else
    {!! Form::model($model, ['route' => ['crm.products.update', $model->id], 'method' => 'put', 'id' => 'product-form']) !!}
@endif
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'Название', ['class' => 'required']); !!}
        {!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('name') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('title', 'Заголовок'); !!}
        {!! Form::text('title', $value = old('title'), $attributes = ['class' => 'form-control']) !!}
        @error('title') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('youtube_id', 'youtube_id'); !!}
        {!! Form::text('youtube_id', $value = old('youtube_id'), $attributes = ['class' => 'form-control']) !!}
        @error('youtube_id') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('price', 'Цена', ['class' => 'required']); !!}
        {!! Form::number('price', $value = old('price'), $attributes = ['class' => 'form-control', ]) !!}
        @error('price') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('fake_price', 'Фейковая цена'); !!}
        {!! Form::number('fake_price', $value = old('fake_price'), $attributes = ['class' => 'form-control']) !!}
        @error('fake_price') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('slug', 'Страница платежа'); !!}
        {!! Form::text('slug', $value = old('slug'), $attributes = ['class' => 'form-control']) !!}
        @error('slug') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('project_id', 'Проект'); !!}
        {!! Form::select('project_id', $selectProjects, old('project_id'), ['class' => 'form-control']) !!}
        @error('project_id') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('type', 'Тип'); !!}
        {!! Form::select('type', $selectTypes, old('type'), ['class' => 'form-control']) !!}
        @error('type') <x-alert type="error" :message="$message"/> @enderror

        <div class="row" style="margin-top: 20px">
            <div class="col-6" style="display: flex; align-items: center">
                {!! Form::label('unlim_bills', 'Безлимитные счета'); !!}
            </div>
                <div class="col-2">
                {!! Form::checkbox('unlim_bills', $value = 1, null, ['class' => 'form-control form-custom-checkbox']); !!}
            </div>
        </div>
        {!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
        {{ link_to_route('crm.products.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}
    </div>

    <div class="col-md-6">
        {!! Form::label('content', 'Контент'); !!}
        <div id="code1"></div>
        {!! Form::textarea('content', $value = old('content'), $attributes = ['style' => 'display: none',  'class' => 'form-control', 'rows' => 3]) !!}
        @error('content') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('content_video', 'Видео контент'); !!}
        <div id="code2"></div>
        {!! Form::textarea('content_video', $value = old('content_video'), $attributes = ['style' => 'display: none',  'class' => 'form-control', 'rows' => 3]) !!}
        @error('content_video') <x-alert type="error" :message="$message"/> @enderror

        <div class="row" style="margin-top: 20px">
            <div class="col-6" style="display: flex; align-items: center">
                {!! Form::label('coauthor_on', 'Активировать соавторство'); !!}
            </div>
            <div class="col-2">
                {!! Form::checkbox('coauthor_on', 1, $model->coauthor, ['class' => 'form-control form-custom-checkbox']); !!}
            </div>
        </div>
        {!! Form::select('coauthor', $selectCommissionTypes, $model->coauthor ? $model->coauthor->coauthor : 1, ['class' => 'form-control']) !!}
        {!! Form::label('commission', 'Коммиссия'); !!}
        {!! Form::number('commission', $model->coauthor ? $model->coauthor->commission : 0, $attributes = ['class' => 'form-control', 'min' => 0]) !!}
        {!! Form::label('commission_type', 'Тип коммисии'); !!}
        {!! Form::select('commission_type', [1 => '%', 2 => 'рубли'], $model->coauthor ? $model->coauthor->commission : 0, ['class' => 'form-control']) !!}


    </div>
</div>

<br>


{!! Form::close() !!}
