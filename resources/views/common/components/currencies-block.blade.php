<div class="currency">
    @foreach($currencies as $currency)
        <div class="val_box">
            <div class="val_name">{{ $currency['code'] }}:</div>
            <div class="val_price">{{ round($price / $currency['value'], 1) }}</div>
        </div>
    @endforeach
</div>
