<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\UpSaleRequest;
use App\Models\Product;
use App\Models\UpSale;
use App\Services\UpSale\UpSaleService;
use Illuminate\Http\Request;

class UpSalesController extends Controller
{

    protected $upSaleService;

    public function __construct(UpSaleService $upSaleService)
    {
        $this->upSaleService = $upSaleService;
    }

    public function index()
    {
        return view('crm.up-sales.index');
    }

    public function create()
    {
        return view('crm.up-sales.create');
    }

    public function store(UpSaleRequest $request)
    {
        $validated = $request->validated();
        $this->upSaleService->createUpSaleByAdminPanel($validated);

        return redirect('up-sales')->with('success', 'Запись успешно создана!');
    }

    public function edit(UpSale $upSale)
    {
        return view('crm.up-sales.edit', compact('upSale'));
    }

    public function update(UpSaleRequest $request, UpSale $upSale)
    {
        $validated = $request->validated();
        $this->upSaleService->editUpSaleByAdminPanel($upSale, $validated);

        return redirect('up-sales')->with('success', 'Изменения успешно применились!');
    }
}
