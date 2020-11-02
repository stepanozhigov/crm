<?php


namespace App\Services\Bill;


use App\Models\Discount;
use App\Models\Product;

class BillHandler
{
    /**
     * Apply discount to bill price
     *
     * @param Product $product
     * @param Discount|null $discount
     *
     * @return int
     */
    public function calculateSum(Product $product, ?Discount $discount): int
    {
        $baseSum = $product->price;

        if (null === $discount) {
            return $baseSum;
        }

        if ($discount->typeCurrency()) {
            $baseSum -= $discount->size;
        } elseif ($discount->typePercent()) {
            $baseSum *= (100 - $discount->size) / 100;
        }

        return (int)$baseSum;
    }
}
