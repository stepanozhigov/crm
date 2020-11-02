@php /** @var $model \App\Models\Webinar */ @endphp

<tr class="@if($modelDeleted) users-row_delete @endif">
    <th scope="row">{{$model->id}}</th>
    <td>{{$model->name}}</td>
    <td><a href="{{ route('crm.webinars.edit', ['webinar' => $model->slug]) }}">{{$model->slug}}</a></td>
    <td>{{$model->page_title}}</td>
    <td>
        <a href="{{ route('crm.webinars.edit', ['webinar' => $model->slug]) }}" class="btn btn-secondary">Редактировать</a>
        <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
    </td>
</tr>
