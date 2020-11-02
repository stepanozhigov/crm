<?php

namespace App\View\Components\LK;

use App\Models\Client;
use App\Models\Product;
use Illuminate\View\Component;

class LeftSidebar extends Component
{
    /** @var Client $client */
    public $client;
    public $openProducts = [];
    public $products = [];

    public function __construct($product)
    {
        $this->client = \Auth::user();
        $this->openProducts = $this->client->openCourses($product->project_id);
        $this->products = Product::where('project_id', $product->project_id)
            ->whereIn('type', [Product::TYPE_OK, Product::TYPE_SK])
            ->whereNotIn('id', $this->openProducts->pluck('id'))
            ->get();
    }

    public function render()
    {
        return view('lk.components.left-sidebar');
    }
}
