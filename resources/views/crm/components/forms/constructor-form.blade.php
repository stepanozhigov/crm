{!! Form::model($project, ['route' => ['crm.constructors.update', $project->id], 'method' => 'put']) !!}

    <div class="row" style="margin-top: 20px">
        <div class="col-6" style="display: flex; align-items: center">
            {!! Form::label('inactive', 'Деактивировать конструктор'); !!}
        </div>
        <div class="col-2">
            {!! Form::checkbox('inactive', 1,  0, ['class' => 'form-control form-custom-checkbox']); !!}
        </div>
    </div>

    {!! Form::label('products', 'Продукты'); !!}
    {!! Form::select('products[]', $products, $checkProducts,  ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
    <br>
    <br>
    {!! Form::label('text', 'Текст') !!}
    {!! Form::textarea('settings[text]', $project->constructor_settings['text'] ?? '', ['class' => 'form-control']) !!}
    <hr>
    {!! Form::label('discount', 'Скидка 1 (%)'); !!}
    {!! Form::number('settings[1][discount]', $project->constructor_settings[1]['discount'], ['class' => 'form-control', 'min' => 0, 'max' => 100]) !!}
    <br>
    {!! Form::label('count', 'Количество курсов '); !!}
    от {!! Form::selectRange('settings[1][from_count]', 1, 20, $project->constructor_settings[1]['from_count']); !!}
    до {!! Form::selectRange('settings[1][to_count]', 1, 20, $project->constructor_settings[1]['to_count']); !!}
    <hr>
    {!! Form::label('discount', 'Скидка 2 (%)'); !!}
    {!! Form::number('settings[2][discount]', $project->constructor_settings[2]['discount'], ['class' => 'form-control', 'min' => 0, 'max' => 100]) !!}
    <br>
    {!! Form::label('count2', 'Количество курсов '); !!}
    от {!! Form::selectRange('settings[2][from_count]', 1, 20, $project->constructor_settings[2]['from_count']); !!}
    до {!! Form::selectRange('settings[2][to_count]', 1, 20, $project->constructor_settings[2]['to_count']); !!}
    <hr>
    {!! Form::label('discount', 'Скидка 3 (%)'); !!}
    {!! Form::number('settings[3][discount]', $project->constructor_settings[3]['discount'], ['class' => 'form-control', 'min' => 0, 'max' => 100]) !!}
    <br>
    {!! Form::label('count3', 'Количество курсов '); !!}
    от {!! Form::selectRange('settings[3][from_count]', 1, 20, $project->constructor_settings[3]['from_count']); !!}
    до {!! Form::selectRange('settings[3][to_count]', 1, 20, $project->constructor_settings[3]['to_count']); !!}

<br>
<br>
    {!! Form::submit('Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
    {{ link_to_route('crm.constructors.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
