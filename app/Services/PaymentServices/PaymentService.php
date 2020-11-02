<?php


namespace App\Services\PaymentServices;


use App\Models\Bill;
use App\Models\PaymentMethod;
use App\Services\PaymentMethod\PaymentMethodRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PaymentService
{

    const INVOICE_STATUS_WAIT = 'wait';
    const INVOICE_STATUS_PAID = 'paid';
    const INVOICE_STATUS_ERROR = 'error';

    protected $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    public function getMethods(Model $bill): Collection
    {
        return $this->paymentMethodRepository->getMethodsByBill($bill);
    }
}
