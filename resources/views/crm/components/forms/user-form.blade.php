@if($action == \App\View\Components\Forms\FormComponent::CREATE)
    {!! Form::model($model, ['route' => ['crm.users.store']]) !!}
@else
    {!! Form::model($model, ['route' => ['crm.users.update', $model->id], 'method' => 'put']) !!}
@endif
<div class="row">
    <div class="col-md-6">

        {!! Form::label('name', 'login', ['class' => 'required']); !!}
        {!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('name') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('email', 'email', ['class' => 'required']); !!}
        {!! Form::email('email', $value = old('email'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('email') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('status', 'статус', ['class' => 'required']); !!}
        {!! Form::select('status',\App\Helpers\UserHelper::getUserStatusSelect() ,$value = old('status'), $attributes = ['class' => 'form-control', 'required']) !!}
        @error('status') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('first_name', 'имя'); !!}
        {!! Form::text('first_name', $value = old('first_name'), $attributes = ['class' => 'form-control']) !!}

        {!! Form::label('last_name', 'фамилия'); !!}
        {!! Form::text('last_name', $value = old('last_name'), $attributes = ['class' => 'form-control']) !!}

        {!! Form::label('password', 'пароль'); !!}
        {!! Form::password('password', $attributes = ['class' => 'form-control']) !!}
        @error('password') <x-alert type="error" :message="$message"/> @enderror

        {!! Form::label('password_confirmation', 'пароль ещё раз'); !!}
        {!! Form::password('password_confirmation', $attributes = ['class' => 'form-control']) !!}
        @error('password_confirmation') <x-alert type="error" :message="$message"/> @enderror

        <br>
        {!! Form::submit( ($action == 'create') ? 'Создать' : 'Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
        {{ link_to_route('crm.users.index', $title = 'Отменить', $parameters = null, $attributes = ['class' => 'btn btn-dark']) }}
    </div>

    <div class="col-md-6">
        <div class="col-md-4">
            <h4 class="text-center">Доступы</h4>
            <div class="row" style="margin-top: 20px;">
                @foreach($permissions as $id => $name)

                    <div class="col-8 checkbox_label">
                        {!! Form::label("permissions", $name); !!}
                    </div>
                    <div class="col-2">
                        {!! Form::checkbox("permissions[{$id}]", $value = 1, in_array($id, $userPermissions), ['class' => 'form-control form_checkbox']); !!}
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

