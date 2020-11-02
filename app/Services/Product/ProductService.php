<?php


namespace App\Services\Product;


use App\Models\Bill;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createFromAdminPanel(array $data): Product
    {
        $product = $this->productRepository->create($data);
        if (!empty($data['coauthor_on'])) {
            $data['product_id'] = $product->id;
            $product->coauthor()->create($data)->save();
        }
        return $product;
    }

    public function editFromAdminPanel(array $data, Product $product): Product
    {
        $product = $this->productRepository->edit($data, $product);
        if (!empty($data['coauthor_on'])) {
            if ($product->coauthor) {
                $product->coauthor->fill($data)->save();
            } else {
                $data['product_id'] = $product->id;
                $product->coauthor()->create($data)->save();
            }
        } else {
            $product->coauthor()->delete();
        }

        return $this->productRepository->edit($data, $product);
    }

    public function coauthorsAttach(Collection $products, Bill $bill)
    {
        $coauthors = [];
        /** @var Product $product */
        foreach ($products as $product) {
            if ($coauthor = $product->coauthor) {
                $coauthor->bills()->attach($bill, ['sum' => $coauthor->getCommissionSum()]);
                $coauthors[] = $coauthor;
            }
        }
    }


}
