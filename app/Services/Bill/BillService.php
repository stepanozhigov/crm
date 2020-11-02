<?php


namespace App\Services\Bill;


use App\Events\BillCreate;
use App\Events\BillPaid;
use App\Models\Bill;
use App\Models\Client;
use App\Models\Discount;
use App\Models\Product;
use App\Models\RbkPay;
use App\Services\Tag\TagRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BillService
{
    protected $billRepository;
    protected $billHandler;
    protected $tagRepository;

    public function __construct(BillRepository $billRepository, BillHandler $billHandler, TagRepository $tagRepository)
    {
        $this->billRepository = $billRepository;
        $this->billHandler = $billHandler;
        $this->tagRepository = $tagRepository;
    }

    public function getAllBillsForAdminPanel(int $count): LengthAwarePaginator
    {
        return $this->billRepository->getAllPaginateWithRelations($count);
    }

    /**
     * Create bill for client
     *
     * @param Client      $client
     * @param Product     $product
     * @param int|null    $discountId
     * @param string|null $tagName
     *
     * @return Bill
     */
    public function getBillForClient(Client $client, Product $product, ?int $discountId, ?string $tagName): Bill
    {
        $bill = $this->billRepository->getBillByProduct($client, $product, $discountId);

        if (!$bill) {
            if ($tagName) {
                $tag   = $this->tagRepository->getTagByName($tagName);
                $tagId = $tag ? $tag->id : $this->tagRepository->create($tagName, $client->wasRecentlyCreated)->id;
            }
            if ($discountId) {
                $discount = Discount::find($discountId);
                $sum      = $this->billHandler->calculateSum($product, $discount);
                $bill     = $this->billRepository->create($client, $product, $tagId ?? null, $discount, $sum);
            } else {
                $bill = $this->billRepository->create($client, $product, $tagId ?? null);
            }
            event(new BillCreate($bill));
        }

        return $bill;
    }

    public function getBillForConstructor(Client $client, Product $product, int $sumSrc, int $sum, array $productsId): Bill
    {
        $bill = $this->billRepository->getBillByProduct($client, $product);

        //update price if bill exist or create new bill
        if ($bill) {
            $this->billRepository->updatePrice($bill, $sumSrc, $sum);
        } else {
            $bill = $this->billRepository->createForConstructor($client, $product, $sumSrc, $sum);
        }

        $bill->products()->sync($productsId);

        return $bill;
    }

    public function addUpSale(Bill $bill, Product $upSaleProduct)
    {
        $bill->products()->attach($upSaleProduct);
        $sumUpSale = $this->billHandler->calculateSum($upSaleProduct, $bill->product->upSale->discount);
        $this->billRepository->increaseUpSaleCost($bill, $sumUpSale);
    }

    public function deleteUpSale(Bill $bill, Product $upSaleProduct)
    {
        $bill->products()->detach();
        $sumUpSale = $this->billHandler->calculateSum($upSaleProduct, $bill->product->upSale->discount);
        $this->billRepository->cutUpSaleCost($bill, $sumUpSale);
    }

    public function webhookStatusRbkPaid($invoiceData)
    {
        $bill = Bill::findOrFail($invoiceData['metadata']['bill_id']);
        /** @var RbkPay $rbkModel */
        $rbkModel = $bill->paymentSystem;
        //additional checking invoice_if from webhook
        if ($rbkModel->invoice_id == $invoiceData['id']) {
            $this->billRepository->changeRbkStatusPaid($bill, $rbkModel);
            event(new BillPaid($bill));
        }
    }

    public function allPaidBillsCountForClient(?Client $client): int
    {
        if ($client) {
            return $client->bills->where('status', Bill::STATUS_PAID)->count();
        } else {
            return 0;
        }
    }

    public function payFromAdminPanel(Bill $bill)
    {
        if ($bill->paymentSystem && $bill->paymentSystem->getMorphClass() == RbkPay::class) {
            $invoiceData = ['metadata' => ['bill_id' => $bill->id], 'id' => $bill->paymentSystem->invoice_id];
            $this->webhookStatusRbkPaid($invoiceData);
        } else {
            $this->billRepository->changeBillStatusPaid($bill);
            event(new BillPaid($bill));
        }
    }

    public function handleWaitingPayment(Bill $bill)
    {
        //@ToDo
        if ($bill->paymentSystem->getMorphClass() == RbkPay::class) {
            return $bill->paymentSystem->user_interaction_request;
        }
    }

}
