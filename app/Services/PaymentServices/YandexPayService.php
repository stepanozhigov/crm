<?php


namespace App\Services\PaymentServices;


use App\Models\Bill;
use App\Services\Bill\BillRepository;
use App\Services\PaymentServices\HttpHandlers\YandexPayHandler;


class YandexPayService
{
    //Http handler for yandex
    private $handler;
    private $billRepository;

    public function __construct(YandexPayHandler $handler, BillRepository $billRepository)
    {
        $this->handler = $handler;
        $this->billRepository = $billRepository;
    }

    public function createPayment(Bill $bill)
    {
        $paymentResponse = $this->handler->createPayment($bill);
        $confirmation_url = $paymentResponse->confirmation->confirmation_url;

        $data = [
            'yandex_id' => $paymentResponse->id,
            'status' => $paymentResponse->status,
            'description' => $paymentResponse->description,
            'confirmation_url' => $confirmation_url,
        ];

        $rbkModel = $this->billRepository->createYandexModel($data);
        $bill->paymentSystem()->associate($rbkModel)->save();

        return $confirmation_url;
    }

    public function getPaymentInfo(string $paymentId)
    {
        return $this->handler->getPaymentInfo($paymentId);
    }


}
