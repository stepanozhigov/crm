@php
use \App\Helpers\BillHelper;
use \App\Helpers\DiscountHelper;
@endphp
<div>

    <div wire:click="show()" id="upSaleMore" class="form_item_submit singleBut upSaleMore upSaleMoreCard" style="display:block">{{__('Оплатить Курс')}}
    </div>

    @if($upSale)
        <div id="upSale" class="upSale upSaleCard" style="display: block;">
            @if(!$upSaleAdded && $show)
                <div class="upSale_text" style="text-align: center">
                    <img src="/img/best.png" alt="" style="width: 95px;">
                        <span style="display: block;color: #c00;font-weight: bold;">{{__('Увеличь свои шансы на успех в два раза!')}}</span>

                    {!! $upSale->content !!}

                    <button wire:click="addUpSale()" type="button" id="payButtonUpSale" class="payButtonUpSale form_item_submit">
                        Да, взять курс со скидкой - {{ DiscountHelper::getDiscountByUpSaleButtonLabel($upSale->discount) }}
                    </button>
                    <div class="order_info_sum">
                        <span class="crossed">{{ $upSale->product->price }} ₽</span>
                        <span class="sale">{{ BillHelper::calculateSum($upSale->product, $upSale->discount) }} ₽</span>
                    </div>
                    <button type="button" id="payButton" class="payButton_nothanks form_item_submit pay-button">{{__('Нет, Спасибо')}}</button>
                </div>
            @elseif ($upSaleAdded)
                <button wire:click="deleteUpSale()" type="button" id="delProd" class="payButton_nothanks delProd form_item_submit" name="delProd">
                    {{__('Удалить из счета курс')}} "{{ $upSale->product->name }}"
                </button>
            @endif

        </div>
    @endif

</div>
