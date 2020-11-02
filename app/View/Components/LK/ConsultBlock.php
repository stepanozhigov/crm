<?php

namespace App\View\Components\LK;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ConsultBlock extends Component
{
    public $consults;

    public function __construct(array $pageSettings, string $gender)
    {
        if ($gender == 'men') {
            $consultsId = $pageSettings['consults-man'] ?? [];
        } else {
            $consultsId = $pageSettings['consults-woman'] ?? [];
        }
       $this->consults = Product::whereIn('id',$consultsId)
           ->orderBy('price')
           ->get();

       $this->addTitles($this->consults);
    }

    public function render()
    {
        return view('lk.components.consult-block');
    }

    private function addTitles(Collection $consults)
    {
        $titles = [
            'title1' => [
                '1 консультация',
                '1 консультация',
                '3 консультации',
                '5 консультаций',
            ],
            'title2' => [
                '(30 минут)',
                '(60 минут)',
                '(3 консультации по 60 минут каждая)',
                '(5 консультаций по 60 минут каждая)',
            ]
        ];
        $consults->transform(function ($item, $key) use ($titles) {
            $item->title1 = $titles['title1'][$key];
            $item->title2 = $titles['title2'][$key];
            return $item;
        });
    }
}
