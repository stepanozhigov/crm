{!! Form::open(['route' => ['common.rbkPay', 'bill' => $bill->getIdHash()], 'class' => 'form', 'id' => 'rbkPayForm']) !!}
    {!! Form::hidden('token', '', ['id' => 'token']) !!}
    {!! Form::hidden('session', '', ['id' => 'session']) !!}
{!! Form::close() !!}
{!! Form::hidden('billId', $bill->id, ['id' => 'billId']) !!}
{!! __("<p>Оплатить можно картой <strong>из любой страны</strong>, только введите свои данные ниже! Сумма спишется <strong>в валюте Вашего счета</strong> по текущему курсу автоматически. Если возникнут вопросы, позвоните по номеру +7&nbsp;(495)&nbsp;120-80-31 или напишите нам <a href='mailto:support@delichev.com'>support@delichev.com</a></p>"); !!}
<div class="form_item clearfix">
    <div class="form_item_card_front">
        <div id="payment-information" style="color: #ff000c; display: none"></div>
        <div class="form_item_card_front_logo">
            <img src="{{asset('/img/pay/desktop/mastercard.svg')}}" alt="Мастеркард"
                    class="form_item_card_front_img">
            <img src="{{asset('/img/pay/desktop/visa.svg')}}" alt="Виза"
                    class="form_item_card_front_img">
            <img src="{{asset('/img/pay/desktop/maestro.svg')}}" alt="Maestro"
                    class="form_item_card_front_img">
            <img src="{{asset('/img/pay/desktop/mir.svg')}}" alt="Мир"
                    class="form_item_card_front_img">
        </div>
        <div class="form_item_card_front_number">
            <input type="text" id="card-number" class="" name="RbcPayCard[cardNumber]" placeholder="_,_,_,_, ,_,_,_,_, ,_,_,_,_, ,_,_,_,_" data-pjax="0" onkeyup="nextCard(this)">                            </div>
        <div class="form_item_card_front_date">
            <input type="text" id="exp-date-month" class="" name="RbcPayCard[expDateMonth]" maxlength="2" placeholder="ММ" onkeyup="nextMonth(this)">
            <span>/</span>
            <input type="text" id="exp-date-year" class="" name="RbcPayCard[expDateYear]" maxlength="2" placeholder="ГГ" onkeyup="nextYear(this)">
        </div>
    </div>
    <div class="form_item_card_back">
        <div class="form_item_card_back_cvc">
            <label>Три&nbsp;цифры с&nbsp;оборотной стороны&nbsp;карты</label>
            <input type="text" id="cvv" class="" name="RbcPayCard[cvv]" maxlength="3" placeholder="CVC">
        </div>
    </div>
</div>
<p id="rbk-card-error" class="error" role="alert"></p>

@if($upSales && $upSales->additionalProducts->isNotEmpty())
    <livewire:up-sale-section :upSales="$upSales" :bill="$bill"/>
@endif

<div>
    <button type="button" id='rbk-pay-button' class='form_item_submit'>{{__('Оплатить Курс')}}</button>
    <div id="rbk-loading" class="lds-ring d-none"><div></div><div></div><div></div><div></div></div>
</div>

<script src="https://rbkmoney.st/tokenizer.js"></script>
<script src="{{asset(mix('js/bill/rbk.js'))}}"></script>


