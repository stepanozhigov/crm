{!! Form::hidden('billHash', $bill->getIdHash(), ['id' => 'billHash']) !!}

{!! __("<p>Оплатить можно картой <strong>из любой страны</strong>, только введите свои данные ниже! Сумма спишется <strong>в валюте Вашего счета</strong> по текущему курсу автоматически. Если возникнут вопросы, позвоните по номеру +7&nbsp;(495)&nbsp;120-80-31 или напишите нам <a href='mailto:support@delichev.com'>support@delichev.com</a></p>"); !!}

<div class="form_item clearfix">
    <div class="form_item_card_front">
        <div id="payment-information" style="color: #ff000c; display: none"></div>
        <div class="form_item_card_front_logo">
            <img src="{{asset('/img/pay/desktop/visa.svg')}}" alt="Виза"
                 class="form_item_card_front_img">
            <img src="{{asset('/img/pay/desktop/mastercard.svg')}}" alt="Мастеркард"
                 class="form_item_card_front_img">
            <img src="{{asset('/img/pay/desktop/maestro.svg')}}" alt="Maestro"
                 class="form_item_card_front_img">
        </div>
        <div class="form_item_card_front_number">
            <input type="text" id="cardNumber" placeholder="_,_,_,_, ,_,_,_,_, ,_,_,_,_, ,_,_,_,_">
        </div>
        <div class="form_item_card_front_date">
            <input type="text" id="expDateMonth" maxlength="2" placeholder={{__("ММ")}}>
            <span>/</span>
            <input type="text" id="expDateYear" maxlength="2" placeholder={{__("ГГ")}}>
        </div>
    </div>
    <div class="form_item_card_back">
        <div class="form_item_card_back_cvc">
            <label>{{__('Три цифры оборотной стороны карты')}}</label>
            <input type="text" id="cvc" maxlength="3" placeholder="CVC">
        </div>
    </div>
</div>
<p id="stripe-card-error" class="error" role="alert"></p>

@if($upSales && $upSales->additionalProducts->isNotEmpty())
    <livewire:up-sale-section :upSales="$upSales" :bill="$bill"/>
@endif

<div>
    <button type="button" id='stripe-pay-button' class='form_item_submit'>{{__('Оплатить Курс')}}</button>
    <div id="stripe-loading" class="lds-ring d-none"><div></div><div></div><div></div><div></div></div>
</div>

@if(env('APP_ENV') == 'local')
    <button ></button>
@endif
<script src="https://js.stripe.com/v3/"></script>
<script src="{{asset(mix('js/bill/stripe.js'))}}"></script>


