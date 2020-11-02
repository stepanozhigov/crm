<?php

namespace App\View\Components;

use App\Helpers\CurrencyHelper;
use App\Models\Bill;
use App\Models\Project;
use Illuminate\View\Component;

class CurrenciesBlock extends Component
{
    public $currencies;
    public $price;

    public function __construct(Bill $bill)
    {
        $lang = $bill->product->project->language;
        if ($lang == Project::LANG_RU) {
            $currencies = ['UAH', 'KZT', 'BYN', 'USD'];
        } else {
            $currencies = CurrencyHelper::getCurrencyByLang($lang);
        }

        $this->price = $bill->sum;
        $this->currencies = CurrencyHelper::getCurrencyValues($currencies);
    }

    public function render()
    {
        return view('common.components.currencies-block');
    }
}
