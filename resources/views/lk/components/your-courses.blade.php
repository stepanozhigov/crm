@php /** @var \App\Models\Product $product */ @endphp

@if ($products->isNotEmpty())
<section id="row__other__aviable__courses">
    <div class="row-cont">
        <div class="row__other__kurs_body" data-description="Нажмите на название вашего курса для его прослушивания">
            <div class="row__other__kurs__title font">{{ __('Ваши курсы') }}</div>
                <div>
                 @foreach($products as $product)
                    <article class="article article__avaliable__courses shadow">
                        <a href="{{ route($subdomain.'product', ['product' => $product->id]) }}">
                            <div class="article_inner">
                                <div class="info_title">{{ $product->name }}</div>
                                <div class="info_go">{{ __('Слушать курс') }}</div>
                            </div>
                        </a>
                    </article>
                 @endforeach
                </div>
        </div>
    </div>
</section>
@endif
