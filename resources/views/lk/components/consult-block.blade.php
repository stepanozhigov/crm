<div class="row__consult_body">
    @foreach($consults as $consult)
        <article class="article__s0 article__s0_4">
            <div class="article_inner">
                <a href="{{ route('common.bill.buy', ['product' => $consult->id , 'client' => $client->id, 'tag' => 'landing']) }}">
                    <div class="info_title">{{ $consult->title1 }}</div>
                    <div class="info_time" style="display: block!important;min-height: 48px;">{{ $consult->title2 }}</div>
                    <div class="info_price">{{ number_format($consult->price, 0, ',', ' ') }} Р</div>
                    <div class="info_buy">Заказать</div>
                </a>
            </div>
        </article>
    @endforeach
</div>
