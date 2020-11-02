{!! __("<p>Оплатить можно картой <strong>из любой страны</strong>, только введите свои данные ниже! Сумма спишется <strong>в валюте Вашего счета</strong> по текущему курсу автоматически. Если возникнут вопросы, позвоните по номеру +7&nbsp;(495)&nbsp;120-80-31 или напишите нам <a href='mailto:support@delichev.com'>support@delichev.com</a></p>"); !!}
<div class="form_item clearfix">

    <div class="form_item_bottom">

        <div id="spiner"></div>
    </div>

</div>

@if($upSales && $upSales->additionalProducts->isNotEmpty())
    <livewire:up-sale-section :upSales="$upSales" :bill="$bill"/>
@endif
    {!! Form::open(['url' => "/payment/yandex-pay/{$bill->getIdHash()}"]) !!}
        {!! Form::submit('оплатить курс', ['id' => 'yandex-pay-button', 'class' => 'form_item_submit']) !!}
    {!! Form::close() !!}
