@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.bill-page.store']]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.bill-page.update', $model->id], 'method' => 'put']) !!}
@endif

<div class="col-md-6">
    {!! Form::label('name', 'Название', ['class' => 'required']); !!}
    {!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
    @error('name') <x-alert type="error" :message="$message"/> @enderror
</div>
<div class="col-md-6">
    {!! Form::label('priority', 'Приоритет', ['class' => 'required']); !!}
    {!! Form::selectRange('priority', 1, 10, old('priority'),  ['class' => 'form-control', 'required']) !!}
    @error('priority') <x-alert type="error" :message="$message"/> @enderror
</div>

<hr>

<div class="row" style="margin-top: 30px">
    <div class="col-md-2">
        {!! Form::label('guaranty', 'Гарантия на возврат'); !!}
    </div>
    <div class="col-md-2">
        {!! Form::checkbox('guaranty[check]', $value = 1, $model->settings['guaranty']['check'] ?? null, ['class' => 'form-control form-custom-checkbox']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('guaranty_override', 'Переопределить базовое'); !!}
    </div>
    <div class="col-md-2">
        {!! Form::checkbox('guaranty[override]', $value = 1, $model->settings['guaranty']['override'] ?? null, ['class' => 'form-control form-custom-checkbox']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        {!! Form::label('product_type', 'Тип продукта'); !!}
        {!! Form::select('guaranty[product_type][]', [
                \App\Models\Product::TYPE_OK => 'Основной курс',
                \App\Models\Product::TYPE_SK => 'Специальный курс'
                ], $model->settings['guaranty']['product_type'] ?? null,  ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('project', 'Проекты'); !!}
        {!! Form::select('guaranty[project][]', $projects, $model->settings['guaranty']['project'] ?? null, ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('product', 'Продукты (Опционально, если не выбрано, применится ко всем продуктам)'); !!}
        {!! Form::select('guaranty[product][]', $products, $model->settings['guaranty']['product'] ?? null,  ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
    </div>
</div>

<hr>

<div class="row" style="margin-top: 30px">

    <div class="col-md-6">
        <div class="row" >
            <div class="col-md-8">
                {!! Form::label('additionalText', 'Доп текст для продажи'); !!}
            </div>
            <div class="col-md-4">
                {!! Form::checkbox('additionalText[check]', $value = 1, $model->settings['additionalText']['check'] ?? null, ['class' => 'form-control form-custom-checkbox']) !!}
            </div>
        </div>
        <div class="row" >
            <div class="col-md-8">
                {!! Form::label('additionalText_override', 'Переопределить базовое'); !!}
            </div>
            <div class="col-md-4">
                {!! Form::checkbox('additionalText[override]', $value = 1, $model->settings['additionalText']['override'] ?? null, ['class' => 'form-control form-custom-checkbox']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        {!! Form::label('product', 'Продукты (Опционально, если не выбрано, применится ко всем продуктам)'); !!}
        {!! Form::select('additionalText[product][]', $products, $model->settings['additionalText']['product'] ?? null,  ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('product_type', 'Тип продукта'); !!}
        {!! Form::select('additionalText[product_type][]', [
                \App\Models\Product::TYPE_OK => 'Основной курс',
                \App\Models\Product::TYPE_SK => 'Специальный курс'
                ], $model->settings['additionalText']['product_type'] ?? null,  ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('project', 'Проекты'); !!}
        {!! Form::select('additionalText[project][]', $projects, $model->settings['additionalText']['project'] ?? null, ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('text', 'Текст'); !!}
        {!! Form::textarea('additionalText[text]', $model->settings['additionalText']['text'] ?? null,  ['class' => 'form-control', 'id' => 'ckeditor']) !!}
    </div>
</div>

<br>
{!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
{{ link_to_route('crm.bill-page.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}

{!! Form::close() !!}
