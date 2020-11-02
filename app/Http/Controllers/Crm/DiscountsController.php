<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Services\Discount\DiscountService;

class DiscountsController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function index()
    {
        return view('crm.discounts.index');
    }

    public function create()
    {
        return view('crm.discounts.create');
    }

    public function store(DiscountRequest $request)
    {
        $validated = $request->validated();
        $this->discountService->createFromAdminPanel($validated);

        return redirect('discounts')->with('success', 'Скидка успешно добавлена!');
    }

    public function edit(Discount $discount)
    {
        return view('crm.discounts.edit', compact('discount'));
    }

    public function update(DiscountRequest $request, Discount $discount)
    {
        $validated = $request->validated();
        $this->discountService->editFromAdminPanel($validated, $discount);

        return redirect('discounts')->with('success', 'Изменения успешно применились!');
    }
}
