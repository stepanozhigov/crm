<?php

use Illuminate\Support\Facades\Route;

Route::domain(env('COMMON_DOMAIN'))->name('common.')->group(function () {

    Route::view('/privatpolicy', 'common.privatpolicy')->name('privatpolicy');
    Route::view('/oferta', 'common.oferta')->name('oferta');

    Route::get('/auto-update-master65236234', 'DeployController@autoUpdateMaster')->name('autoUpdateMaster');

    Route::middleware(['setlocale'])->group(function() {
        //bitbucket

        Route::get('/', 'LandingController@index')->name('landing');
        Route::get('/vm', 'LandingController@vm')->name('landing.vm');
        Route::get('/vd', 'LandingController@vd')->name('landing.vd');
        Route::get('/vz', 'LandingController@vz')->name('landing.vz');

        Route::get('/webinar/{webinar}', 'WebinarController@index')->name('webinar');

        Route::get('/bill/{bill}', 'BillController@index')->name('bill.index');
        Route::get('/bill/wait/{bill}', 'BillController@wait')->name('bill.wait');
        Route::get('/buy/{product}/{client}', 'BillController@clientBuy')->name('bill.buy');
        Route::post('/product/{product}', 'BillController@product')->name('bill.product');

        Route::get('/payment/success','PaymentController@success')->name('payment.success');
        Route::post('/payment/rbk-pay/{bill}', 'PaymentController@rbkPay')->name('rbkPay');
        Route::post('/payment/get-invoice-rbk', 'PaymentController@getInvoiceRbk')->name('getInvoiceRbk');
        Route::post('/payment/yandex-pay/{bill}', 'PaymentController@yandexPay')->name('yandexPayment');
        Route::post('/payment/get-stripe-data/{bill}', 'PaymentController@getStripeData')->name('stripeData');
    });

    //Payment webhooks
    Route::post('/webhook/rbk', 'WebhookController@rbk')->name('webhook.rbk');
    Route::post('/webhook/stripe', 'WebhookController@stripe')->name('webhook.stripe');
});



