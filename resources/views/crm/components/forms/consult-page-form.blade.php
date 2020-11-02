@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.consult-page.store'], 'id' => 'consult-page-form']) !!}
@else
    {!! Form::model($model, ['route' => ['crm.consult-page.update', $model->id], 'method' => 'put', 'id' => 'consult-page-form']) !!}
@endif
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'Название', ['class' => 'required']); !!}
        {!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('name') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('priority', 'Приоритет', ['class' => 'required']); !!}
        {!! Form::selectRange('priority', 1, 10, old('priority'),  ['class' => 'form-control', 'required']) !!}
        @error('priority') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('project', 'Проект'); !!}
        {!! Form::select('settings[project]', $projects, $model->settings['project'] ?? null, ['class' => 'form-control']) !!}
        @error('project') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('consults-man', 'Консультации мужчина'); !!}
        {!! Form::select('settings[consults-man][]', $consults, $model->settings['consults-man'] ?? null, ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
        @error('consults-man') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('consults-woman', 'Консультации женщина'); !!}
        {!! Form::select('settings[consults-woman][]', $consults, $model->settings['consults-woman'] ?? null, ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
        @error('consults-woman') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('content', 'Контент'); !!}
        <div id="code"></div>

        {!! Form::textarea('settings[content]', $model->settings['content'] ?? null, $attributes = ['style' => 'display: none',  'class' => 'form-control', 'rows' => 4, 'id' => 'content']) !!}
        @error('content') <x-alert type="error" :message="$message"/> @enderror
        <br>

    <br>
    {!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
    {{ link_to_route('crm.consult-page.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}
    </div>

    <div class="col-md-6">
        {!! Form::label('comments', 'Отзывы общие'); !!}
        {!! Form::text('settings[commentsMain][0][name]', $model->settings['commentsMain'][0]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsMain][0][text]', $model->settings['commentsMain'][0]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
        {!! Form::text('settings[commentsMain][1][name]', $model->settings['commentsMain'][1]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsMain][1][text]', $model->settings['commentsMain'][1]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
        {!! Form::text('settings[commentsMain][2][name]', $model->settings['commentsMain'][2]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsMain][2][text]', $model->settings['commentsMain'][2]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
        {!! Form::text('settings[commentsMain][3][name]', $model->settings['commentsMain'][3]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsMain][3][text]', $model->settings['commentsMain'][3]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>

        {!! Form::label('comments', 'Отзывы мужчина'); !!}
        {!! Form::text('settings[commentsMan][0][name]', $model->settings['commentsMan'][0]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsMan][0][text]', $model->settings['commentsMan'][0]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
        {!! Form::text('settings[commentsMan][1][name]', $model->settings['commentsMan'][1]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsMan][1][text]', $model->settings['commentsMan'][1]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
        {!! Form::text('settings[commentsMan][2][name]', $model->settings['commentsMan'][2]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsMan][2][text]', $model->settings['commentsMan'][2]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>

        {!! Form::label('comments', 'Отзывы Женщина'); !!}
        {!! Form::text('settings[commentsWoman][0][name]', $model->settings['commentsWoman'][0]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsWoman][0][text]', $model->settings['commentsWoman'][0]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
        {!! Form::text('settings[commentsWoman][1][name]', $model->settings['commentsWoman'][1]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsWoman][1][text]', $model->settings['commentsWoman'][1]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
        {!! Form::text('settings[commentsWoman][2][name]', $model->settings['commentsWoman'][2]['name'] ?? null, ['class' => 'form-control', 'style' => 'margin-bottom:10px']) !!}
        {!! Form::textarea('settings[commentsWoman][2][text]', $model->settings['commentsWoman'][2]['text'] ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        <br>
    </div>
</div>
{!! Form::close() !!}
