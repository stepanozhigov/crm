<?php


namespace App\Services\PaymentMethod;


use App\Models\PaymentMethod;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PaymentMethodRepository
{


    public function create(array $all, ?UploadedFile $file = null): PaymentMethod
    {
        $paymentMethod = new PaymentMethod($all);
        $paymentMethod->logo = $file ? $this->getActualStorageLink($file->store('public/logos')) : null;
        $paymentMethod->save();

        return $paymentMethod;
    }

    public function edit(array $all, PaymentMethod $paymentMethod, ?UploadedFile $file = null): PaymentMethod
    {
        $paymentMethod->fill($all);
        if ($file) {
            if ($oldImagePath = $paymentMethod->getOriginal('logo')) {
                Storage::delete($oldImagePath);
            }
            $paymentMethod->logo = $this->getActualStorageLink($file->store('public/logos'));
        }
        $paymentMethod->save();

        return $paymentMethod;
    }

    public function getMethodsByBill($bill): Collection
    {
        return PaymentMethod::where('status', PaymentMethod::STATUS_ACTIVE)->get();
    }

    private function getActualStorageLink(string $store): string
    {
        return str_replace('public', 'storage', $store);
    }
}
