<?php


namespace App\Helpers;


use App\Models\Discount;
use App\Models\Project;

class DiscountHelper
{

    private static $types = [
        Discount::TYPE_CURRENCY => 'Валюта',
        Discount::TYPE_PERCENT => '%'
    ];

    public static function getDiscountByUpSaleButtonLabel(Discount $discount)
    {
        if ($discount->typeCurrency()) {
            return $discount->size . ' руб';
        } elseif ($discount->typePercent()) {
            return $discount->size . ' %';
        }

        return '';
    }
    public static function getDiscountTypesForForm()
    {
        return self::$types;
    }

    public static function getDiscountTypeName(int $type)
    {
        return self::$types[$type] ?? '';
    }

    public static function getDiscountForConstructor(Project $project, $count): int
    {
        $settings = $project->constructor_settings;

        foreach ($settings as $setting) {
            if (isset($setting['discount'])) {
                if ($count >= $setting['from_count'] && $count <= $setting['to_count']) {
                    return (int)$setting['discount'];
                }
            }
        }

        return 0;
    }

}
