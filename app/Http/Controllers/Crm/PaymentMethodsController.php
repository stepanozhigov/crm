<?php

namespace App\Http\Controllers\Crm;


use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use App\Services\PaymentMethod\PaymentMethodService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentMethodsController extends Controller
{

    private $paymentMethodService;

    public function __construct(PaymentMethodService $paymentMethodService)
    {
        $this->paymentMethodService = $paymentMethodService;
    }

    public function index()
    {
        $paymentMethods = PaymentMethod::paginate(20);
        return view('crm.payment-methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('crm.payment-methods.create');
    }

    public function store(PaymentMethodRequest $request)
    {
        $validated = $request->validated();
        $this->paymentMethodService->createByAdminPanel($validated, $request->file('logo'));

        return redirect('payment-methods')->with('success', 'Запись успешно создана!');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('crm.payment-methods.edit', compact('paymentMethod'));
    }

    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $validated = $request->validated();
        $this->paymentMethodService->editByAdminPanel($validated, $paymentMethod, $request->file('logo'));

        return redirect('payment-methods')->with('success', 'Изменения успешно применились!');
    }

}
