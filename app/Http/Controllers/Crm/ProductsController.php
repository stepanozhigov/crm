<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('crm.products.index');
    }

    public function create()
    {
        return view('crm.products.create');
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $this->productService->createFromAdminPanel($validated);

        return redirect('products')->with('success', 'Запись успешно создана!');
    }

    public function edit(Product $product)
    {
        return view('crm.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $this->productService->editFromAdminPanel($validated, $product);

        return redirect('products')->with('success', 'Изменения успешно применились!');;
    }
}
