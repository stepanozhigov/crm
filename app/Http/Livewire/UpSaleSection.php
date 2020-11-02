<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\Models\Product;
use App\Models\UpSale;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class UpSaleSection extends Component
{

    /**
     * @var UpSale $upSales
     * @var  Bill $bill
     */
    public $upSales;
    public $bill;

    public function mount(Bill $bill, UpSale $upSales)
    {
        $this->upSales = $upSales;
        $this->bill = $bill;
    }

    public function upSale(int $id)
    {
        $product = Product::findOrFail($id);
        $selectedProducts = $this->bill->products->pluck('id')->toArray();

        //add or delete additional product with bill
        if (in_array($id, $selectedProducts)) {
            $this->bill->products()->detach($product);
            $this->bill->sum -= $product->price;
            $this->bill->sum_src -= $product->fake_price;
            $this->bill->save();
        } else {
            $this->bill->products()->attach($product);
            $this->bill->sum += $product->price;
            $this->bill->sum_src += $product->fake_price;
            $this->bill->save();
        }

        $this->bill->load('products');

        //name of products for payment page
        $productsJson = $this->bill->products
            ->push($this->bill->product)
            ->reverse()
            ->pluck('name')
            ->toJson();

        $this->emit('newSum', [
            'sum' => $this->bill->sum,
            'sumSrc' => $this->bill->sum_src,
            'id' => 'up-sale-'.$product->id,
            'productsJson' => $productsJson
        ]);
    }

    public function render()
    {
        return view('common.livewire.up-sale-section');
    }
}
