<?php


namespace App\Services\Product;


use App\Models\Coauthor;
use App\Models\Product;


class ProductRepository
{

    public function create(array $data): Product
    {
        $product = new Product($data);
        if (isset($data['unlim_bills'])) {
            $product->unlim_bills = 0;
        }
        $product->save();

        return $product;
    }

    public function edit(array $data, Product $product): Product
    {
        $product->fill($data);
        if (isset($data['unlim_bills'])) {
            $product->unlim_bills = 0;
        }

        $product->save();

        return $product;
    }

    public function coauthorCreate(array $data, int $productId)
    {
        $coauthor = new Coauthor($data);
        $coauthor->product_id = $productId;
        $coauthor->save();

        return $coauthor;
    }

}
