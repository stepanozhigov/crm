<?php


namespace App\Helpers;


use App\Models\Product;

class ProductHelper
{

    public static function getTypeLabel(int $type): string
    {
        switch ($type) {
            case Product::TYPE_OK:
                return 'ОК';
            case Product::TYPE_SK:
                return 'СК';
            case Product::TYPE_CONSULT:
                return 'Консультация';
            case Product::TYPE_CONSTRUCT:
                return 'Конструктор';
            default:
                return 'Другое';
        }
    }
}
