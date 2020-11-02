<?php


namespace App\Services\UpSale;


use App\Models\UpSale;

class UpSaleService
{
    public $upSaleRepository;

    public function __construct(UpSaleRepository $upSaleRepository)
    {
        $this->upSaleRepository = $upSaleRepository;
    }

    public function createUpSaleByAdminPanel(array $data): UpSale
    {
        $usSale = $this->upSaleRepository->createByAdminPanel($data);
        $usSale->additionalProducts()->attach($data['additional_product_id'], ['status' => 1]);

        return $usSale;
    }

    public function editUpSaleByAdminPanel(UpSale $upSale, array $data): UpSale
    {
        $upSale = $this->upSaleRepository->editByAdminPanel($upSale, $data);
        $upSale->additionalProducts()->sync($data['additional_product_id']);

        return $upSale;
    }
}
