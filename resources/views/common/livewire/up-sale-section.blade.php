@php /** @var \App\Models\ProductUpSale $product */@endphp

<div class="form_item_bottom">
    <div wire:loading.class="pointer-none" class="additionally" id="additionally" >
        <p><b>Рекомендовано автором:</b></p>
        @foreach($upSales->additionalProducts as $product)
            <div class="additionally_item" wire:click="upSale({{$product->id}})">
                <p>
                    <input type="checkbox" @if(in_array($product->id, $bill->products()->pluck('id')->toArray())) checked @endif
                           class="additionally_item_checkbox" id="up-sale-{{$product->id}}">
                    {!! $product->title !!}
                </p>
            </div>
        @endforeach

    </div>

</div>


