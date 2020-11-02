<?php

namespace App\Http\Livewire;

use App\Helpers\DiscountHelper;
use App\Services\Bill\BillHandler;
use App\Services\Bill\BillRepository;
use App\Services\Bill\BillService;
use App\Services\Tag\TagRepository;
use Livewire\Component;
use App\Models\Client as ClientModel;
use App\Models\Project as ProjectModel;

class ConstructorOfCourses extends Component
{
    public $constructorProduct;
    public $client;
    public $project;
    public $products;
    public $checkProducts = [];
    public $sumSrc = 0;
    public $sum = 0;

    public function mount(ClientModel $client, ProjectModel $project)
    {
        $this->client = $client;
        $this->project = $project;
        $this->constructorProduct = $this->project->constructor;
        $this->products = \Arr::pluck($project->productsForConstructor, 'name', 'id');
        $existBill = $client->bills()->where('product_id', $this->constructorProduct->id)->first();
        if ($existBill) {
            $existProducts = $existBill->products;
            $this->checkProducts = \Arr::pluck($existProducts, 'name', 'id');
            $this->calculateSum();
        }
    }

    public function check($productId)
    {
        if (!key_exists($productId, $this->checkProducts)) {
            $this->checkProducts[$productId] = $this->products[$productId];
        } else {
            unset($this->checkProducts[$productId]);
        }
        $this->calculateSum();
    }

    public function render()
    {
        return view('lk.livewire.constructor-of-courses');
    }

    public function order()
    {
        $billService = new BillService(new BillRepository(), new BillHandler(), new TagRepository());
        $bill = $billService->getBillForConstructor($this->client, $this->constructorProduct, $this->sumSrc, $this->sum, array_keys($this->checkProducts));

        return redirect()->away(env('COMMON_DOMAIN') . '/bill/' . $bill->getIdHash());
    }

    private function calculateSum()
    {
        $this->sumSrc = \App\Models\Product::whereKey(array_keys($this->checkProducts))->sum('price');
        $discount = DiscountHelper::getDiscountForConstructor($this->project, count($this->checkProducts));
        if ($discount) {
            $this->sum = $this->sumSrc * (100 - $discount) / 100;
        } else {
            $this->sum = $this->sumSrc;
        }
    }


}
