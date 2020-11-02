<?php


namespace App\Services\Discount;


use App\Models\Discount;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DiscountRepository
{
    public function createWithProducts(array $data): Discount
    {
        $discount = new Discount($data);

        if (!isset($data['sw_time_limit'])) {
            $discount->sw_time_limit = 0;
        }
        $discount->save();
        $discount->products()->attach($data['products']);

        return $discount;
    }

    public function updateWithProducts(array $data, Discount $discount): Discount
    {
        $discount->fill($data);
        if (!isset($data['sw_time_limit'])) {
            $discount->sw_time_limit = 0;
        }
        $discount->save();
        $discount->products()->sync($data['products']);

        return  $discount;
    }

    public function getAllWithPaginate(int $count): LengthAwarePaginator
    {
        return Discount::paginate($count);
    }
}
