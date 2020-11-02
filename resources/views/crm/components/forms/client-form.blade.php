@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.clients.store'], 'id' => 'client-form']) !!}
@else
    {!! Form::model($model, ['route' => ['crm.clients.update', $model->id], 'method' => 'put', 'id' => 'product-form']) !!}
@endif
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'login', ['class' => 'required']); !!}
        {!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('name') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('email', 'email', ['class' => 'required']); !!}
        {!! Form::email('email', $value = old('email'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('email') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('projects', 'проекты'); !!}
        {!! Form::select('projects[]', $projects ,$value = old('projects'), $attributes = ['class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}
        @error('projects') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('status', 'статус', ['class' => 'required']); !!}
        {!! Form::select('status',\App\Helpers\UserHelper::getUserStatusSelect() ,$value = old('status'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('status') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('password', 'пароль'); !!}
        {!! Form::password('password', $attributes = ['class' => 'form-control']) !!}
        @error('password') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('password_confirmation', 'пароль ещё раз'); !!}
        {!! Form::password('password_confirmation', $attributes = ['class' => 'form-control']) !!}
        @error('password_confirmation') <x-alert type="error" :message="$message"/> @enderror
        <br>
        {!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
        {{ link_to_route('crm.clients.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}
    </div>

    <div class="col-md-6">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach($projectModels as $key => $project)
                <li class="nav-item">
                    <a class="nav-link @if($loop->first) active @endif"  data-toggle="tab" href="#tab-{{$key}}" role="tab"
                       aria-controls="{{$key}}" aria-selected="@if($loop->first) true @else false @endif">{{$project->name}}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            @foreach($projectModels as $key => $project)
                <div class=" tab-pane fade @if($loop->first) show active @endif" id="tab-{{$key}}" role="tabpanel" aria-labelledby="{{$key}}-tab">
                    <div class="row">
                        @if($project->productsOK)
                            {{--    main course   --}}
                            <div class="col-6 checkbox_label">
                                {!! Form::label("products[{$project->productsOK->id}]", $project->productsOK->name); !!}
                            </div>
                            <div class="col-2">
                                {!! Form::checkbox("products[{$project->productsOK->id}]", $value = 1, in_array($project->productsOK->id, Arr::pluck($model->products, 'id')), ['class' => 'form-control form_checkbox']); !!}
                            </div>
                        @endif
                        @foreach($project->productsSK as $product)
                            <div class="col-6 checkbox_label">
                                {!! Form::label("products[{$product->id}]", $product->name); !!}
                            </div>
                            <div class="col-2">
                                {!! Form::checkbox("products[{$product->id}]", $value = 1, in_array($product->id, Arr::pluck($model->products, 'id')), ['class' => 'form-control form_checkbox']); !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</div>




