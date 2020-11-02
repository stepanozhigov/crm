<div class="colCheck">

    <div class="kit_box">
        <div class="form-group field-packcustom-openprod">
            <label class="control-label">{{ __('Выберите нужные курсы') }}</label>
            <div id="packcustom-openprod">
                @foreach($products as $productId => $productName)
                    <div class="checkbox">
                        <label>
                            @if(!$client->hasProduct($productId))
                                <input wire:click="check({{$productId}})"
                                       @if (key_exists($productId, $checkProducts)) checked="1" @endif
                                       value="{{$productId}}" type="checkbox"> {{$productName}}
                            @else
                                <input value="{{$productId}}" disabled="1" checked="1" type="checkbox"> {{$productName}}
                                (уже куплен)
                            @endif
                        </label>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="kit_box_result">
            <label class="control-label">{{ __('Пакет выбранных Вами курсов') }}</label>
            <div class="colChecked">

                @foreach($checkProducts as $checkID => $checkName)
                    {{ $checkName }}
                    <br>
                @endforeach
            </div>
        </div>
    </div>

    <h2 class="kit_cost">
        <div id="srcPrice">
            @if ($sumSrc !== $sum)
                {{ $sumSrc }} {{ __('руб') }}
            @endif
        </div>
        <div id="discoutPrice">
            {{ $sum }} {{ __('руб') }}
        </div>
    </h2>

    <button wire:click="order" class="btn btn-primary green kit_button" name="save" value="1">Заказать выбранный пакет</button>
</div>
