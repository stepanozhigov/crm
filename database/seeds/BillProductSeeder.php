<?php

use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class BillProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bills = Bill::all();
        $rows = [];
        foreach ($bills as $bill) {
            $product = Product::find(rand(1,20));
            $rows[] = [
                'bill_id' => $bill->id,
                'product_id' => $product->id,
                'price' => $product->price,
                'primary' => 1
            ];
        }

        BillProduct::insert($rows);
    }
}
