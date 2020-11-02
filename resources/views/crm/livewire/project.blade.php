@php /** @var $model \App\Models\Project */ @endphp

<tr class="@if($modelDeleted) users-row_delete @endif">
    <th scope="row">{{$model->id}}</th>
        <td><a href="{{ route('crm.projects.edit', ['project' => $model->id]) }}">{{$model->name}}</a></td>
        <td>{{$model->domain}}</td>
        <td>{{$model->language}}</td>
        <td>{{$model->currency}}</td>
    <td>
        <a href="{{ route('crm.projects.edit', ['project' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
    </td>
</tr>
