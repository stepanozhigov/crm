<?php

namespace App\View\Components;

use App\Helpers\CurrencyHelper;
use App\Models\Bill;
use App\Models\Product;
use App\Models\UpSale;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PaymentMethods extends Component
{
    public $paymentMethods;
    public $upSales;
    public $bill;

    public function __construct(Collection $paymentMethods, Bill $bill, ?UpSale $upSales)
    {
        $this->paymentMethods = $paymentMethods;
        $this->bill = $bill;
        $this->upSales = $upSales;
    }

    public function render()
    {
        return view('common.components.payment-methods');
    }
}
