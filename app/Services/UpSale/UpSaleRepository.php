<?php


namespace App\Services\UpSale;


use App\Models\UpSale;

class UpSaleRepository
{

    public function createByAdminPanel(array $data): UpSale
    {
        $upSale = new UpSale($data);
        $upSale->save();

        return  $upSale;
    }

    public function editByAdminPanel(UpSale $upSale, array $data)
    {
        $upSale->fill($data)->save();
        return $upSale;
    }
}
