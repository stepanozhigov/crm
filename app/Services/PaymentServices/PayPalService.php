<?php


namespace App\Services\PaymentServices;


use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalService
{
    public function pay()
    {
        $provider = new ExpressCheckout;      // To use express checkout.
        $provider = new AdaptivePayments;

        $provider->setCurrency('RUB')->setExpressCheckoutOptions([
            'payment_action' => '',
            'notify_url' => '',
            'locale' => 'RU'
        ]);
    }

}
