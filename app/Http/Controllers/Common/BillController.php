<?php

namespace App\Http\Controllers\Common;

;
use App\Http\Requests\BillProductRequest;
use App\Models\Bill;
use App\Models\Client;
use App\Models\Product;
use App\Models\Tag;
use App\Services\Auth\ClientService;
use App\Services\Bill\BillService;
use App\Services\Page\BillPage\BillPageService;
use App\Services\PaymentServices\PaymentService;
use App\Services\PaymentServices\RbkService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use URL;

class BillController extends Controller
{
    protected $paymentService;
    protected $clientService;
    protected $billService;
    protected $billPageService;
    protected $rbkService;

    public function __construct(
        PaymentService $paymentService,
        ClientService $clientService,
        BillService $billService,
        BillPageService $billPageService,
        RbkService $rbkService
    ) {
        $this->paymentService  = $paymentService;
        $this->clientService   = $clientService;
        $this->billService     = $billService;
        $this->billPageService = $billPageService;
        $this->rbkService      = $rbkService;
    }

    public function index(Bill $bill, Request $request)
    {
        App::setLocale($bill->product->project->language);
        $paymentMethods = $bill->product->project->paymentActiveMethods;

        if ($bill->statusPaid()) {
            $countBills = $this->billService->allPaidBillsCountForClient($bill->client);
            return view('common.bill.payment-paid', compact('countBills'));
        } elseif ($bill->statusCanceled() || $bill->statusRefunded()) {
            abort(404);
        } elseif ($bill->statusWait()) {
            // if payment is not confirmed @todo
            if ($request->get('wait')) {
                $userInteractionRequest = $this->billService->handleWaitingPayment($bill);
                if ($userInteractionRequest) {
                    return view('common.bill.check-status', [
                            'userInteractionRequest' => $userInteractionRequest
                        ]
                    );
                } else {
                    return dd('Ошибка платежной системы! Обратитесь в поддержку');
                }
            }
            sleep(2);
            return redirect(Url::route('common.bill.index', ['bill' => $bill->getIdHash(), 'wait' => 1]));
        }

        //get available upSale if exist
        $upSales            = $bill->product->upSalesActive;
        $additionalProducts = $bill->products;
        $settings           = $this->billPageService->setBillPageSettings($bill);

        return view('common.bill.index', compact('paymentMethods', 'bill', 'settings', 'upSales', 'additionalProducts'));
    }

    //create client and bill
    public function product(BillProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $client    = $this->clientService->getClientForBill($validated);
        $bill      = $this->billService->getBillForClient($client, $product, $request->get('sale') ?? $validated['discountId'] ?? null, $validated['tag'] ?? null);
        
        return redirect()->route('common.bill.index', ['bill' => $bill->getIdHash()]);
    }

    //sale to existing client
    public function clientBuy(Request $request, Product $product, Client $client)
    {
        $bill = $this->billService->getBillForClient($client, $product, $request->get('sale'), $request->get('tag'));

        return redirect()->route('common.bill.index', ['bill' => $bill->getIdHash()]);
    }
}
