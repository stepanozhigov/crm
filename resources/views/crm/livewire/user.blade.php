@php /** @var $model \App\Models\User */ @endphp

<tr class="@if($modelDeleted) users-row_delete @endif">
    <th scope="row">{{$model->id}}</th>
        <td><a href="{{ route('crm.users.edit', ['user' => $model->id]) }}">{{$model->name}}</a></td>
        <td>{{$model->email}}</td>
        <td>{!! \App\Helpers\UserHelper::getStatusLabel($model->status) !!}</td>
        <td>{{$model->first_name}}</td>
        <td>{{$model->last_name}}</td>
        <td>{{$model->last_visit}}</td>
    <td>
        <a href="{{ route('crm.users.edit', ['user' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
        <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
    </td>
</tr>
