@php /** @var $model \App\Models\PaymentMethod */ @endphp

<tr class="@if($modelDeleted) users-row_delete @endif">
    <th scope="row">{{$model->id}}</th>
    <td><a href="{{ route('crm.payment-methods.edit', ['payment_method' => $model->id]) }}">{{$model->name}}</a></td>
    <td>{{$model->title}}</td>
    <td>{!!\App\Helpers\FormHelper::getLabelActive($model->status) !!}</td>
    <td>
        <a href="{{ route('crm.payment-methods.edit', ['payment_method' => $model->id]) }}" class="btn btn-secondary">Редактировать</a>
    </td>
</tr>
