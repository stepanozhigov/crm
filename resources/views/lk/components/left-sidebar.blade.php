@php
/** @var \App\Models\Product $openProduct
 * @var \App\Models\Product $product */
@endphp

<div class="textwidget">
    <div class="aside-courses">
        <div class="aside-courses__title">{{ __('Ваши курсы') }}</div>
        <ul class="aside-courses__list">
            @foreach($openProducts as $openProduct)
                <li class="avaliable-courses-item avaliable-courses-item-1757"><a href="{{ route($subdomain.'product', ['product' => $openProduct->id]) }}" title="{{ $openProduct->name }}">{{ $openProduct->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>

<div class="textwidget">
    <div class="aside-courses">
        <ul class="aside-courses__list">
            <div class="aside-courses__title">{{ __('Спецкурсы') }}</div>

            @foreach($products as $product)

            <a href="{{ route($subdomain.'product', ['product' => $product->id]) }}" target="_blank" title="{{ $product->name }}">
                <li class=" avaliable-courses-item">
                    {{ $product->name }}
                </li>
            </a>
            @endforeach
        </ul>
    </div>
</div>
