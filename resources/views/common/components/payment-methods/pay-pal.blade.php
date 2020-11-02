<div>
    <p style="margin-bottom: 0px!important;">Если у Вас уже открыт счет в PayPal, то нажмите на кнопку ОПЛАТИТЬ КУРС ниже. Вы будете временно перенаправлены на страницу PayPal, где сможете провести оплату. Сумма спишется <strong>в валюте Вашего счета</strong> по текущему курсу автоматически. В конце обязательно нажмите: «Вернуться к странице продавца». </p>
    <div class="form_item_bottom">
        @if($upSales && $upSales->additionalProducts->isNotEmpty())
            <livewire:up-sale-section :upSales="$upSales" :bill="$bill"/>
        @endif
    </div>
</div>
