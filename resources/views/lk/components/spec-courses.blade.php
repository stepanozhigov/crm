@if($products->isNotEmpty())
<section id="row__other__kurs">
    <div class="row-cont">
        <div class="row__other__kurs_body clear">
            <div class="row__other__kurs__title">{{ __('Спецкурсы') }}</div>
            @foreach($products as $product)
            <article class="article__notavaliable__courses">
                <div class="discount_clear"></div>

                <a href="{{ route($subdomain.'buy', ['product' => $product->id]) }}">

                    <div class="article_inner">
                        <div class="info_title">{{ $product->name }}</div>
                        <div class="info_go">{{ __('Подробнее') }}</div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
