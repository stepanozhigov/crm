<?php


namespace App\Services\Discount;


use App\Models\Discount;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DiscountService
{

    protected $discountRepository;

    public function __construct(DiscountRepository $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    public function createFromAdminPanel(array $data): Discount
    {
        return $this->discountRepository->createWithProducts($data);
    }

    public function editFromAdminPanel(array $data, Discount $discount): Discount
    {
        return $this->discountRepository->updateWithProducts($data, $discount);
    }

}
