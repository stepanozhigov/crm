@php /** @var $paymentMethods \App\Models\PaymentMethod [] */ @endphp
@if(Agent::isMobile())

    <div id="carousel" class="flexslider">
        <ul class="slides">
            @foreach($paymentMethods as $key => $paymentMethod)
                <li class="carousel_item"
{{--                    onclick="callMethodPay ({{$paymentMethod->id}})"--}}
                    id="pm-{{$paymentMethod->id}}">
                    <img src="{{ asset($paymentMethod->logo) }}" alt="{{$paymentMethod->title}}" class="carousel_item_icon">
                    <div class="carousel_item_title">
                        @if(!$paymentMethod->name == "Stripe") {{$paymentMethod->title}} @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="slider" class="flexslider">
        <ul class="slides">
            @foreach($paymentMethods as $key => $paymentMethod)
            <li>
                @if($paymentMethod->isRBK())
                <div class="slider_item">
                    @include('common.components.payment-methods.rbk')
                </div>
                @elseif($paymentMethod->isPayPal())
                    @include('common.components.payment-methods.pay-pal')
                @elseif($paymentMethod->isStripe())
                    @include('common.components.payment-methods.stripe')
                @else
                    {!! $paymentMethod->content_page !!}
                @endif
            </li>
            @endforeach
        </ul>
    </div>

@else

    <div class="tabs clearfix">
    @if (count($paymentMethods) > 3)
        <div class="tabs-nav clearfix">
    @else
        <div class="tabs-nav width-content clearfix">
    @endif
        @foreach($paymentMethods as $key => $paymentMethod)
            @if ($key == 3)
                <div href="#content1" class="tabs_nav_more">
                    <span class="tabs_nav_more_arrow"></span>Еще
                </div>
        </div>
        <div class="tabs-nav tabs-nav_inner clearfix">
        @endif
        <a href="#content{{$key}}"
           class="tabs-nav-item nav-link @if($loop->first) active @endif @if($key >=3) tabs-nav-item_inner @endif"
           {{--                       onclick="callMethodPay({{$key}})"--}}
           data-toggle="tab" >
            <img src="{{ asset($paymentMethod->logo) }}"
                 alt="{{ $paymentMethod->title }}" class="tabs-nav-item-icon">
            <span class="tabs-nav-item-title">{{$paymentMethod->title}}</span>
        </a>
        @endforeach
    </div>

    <div class="tabs-box">
        @foreach($paymentMethods as $key => $paymentMethod)
            <div class="tabs-box-item @if($loop->first) active @endif" id="content{{$key}}">
                <div class="tabs-box-item_inner">

                    @if($paymentMethod->isRBK())
                        @include('common.components.payment-methods.rbk')
                    @elseif($paymentMethod->isPayPal())
                        @include('common.components.payment-methods.pay-pal')
                    @elseif($paymentMethod->isYandex())
                        @include('common.components.payment-methods.yandex')
                    @elseif($paymentMethod->isStripe())
                        @include('common.components.payment-methods.stripe')
                    @else
                        {!! $paymentMethod->content_page !!}
                        @if($upSales && $upSales->additionalProducts->isNotEmpty())
                            <livewire:up-sale-section :upSales="$upSales" :bill="$bill"/>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
