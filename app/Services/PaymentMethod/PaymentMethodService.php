<?php


namespace App\Services\PaymentMethod;


use App\Models\PaymentMethod;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class PaymentMethodService
{

    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    public function createByAdminPanel(array $data, ?UploadedFile $uploadedFile): PaymentMethod
    {
        return $this->paymentMethodRepository->create($data, $uploadedFile);
    }

    public function editByAdminPanel(array $data, PaymentMethod $paymentMethod, ?UploadedFile $uploadedFile): PaymentMethod
    {
        return $this->paymentMethodRepository->edit($data, $paymentMethod, $uploadedFile);
    }
}
