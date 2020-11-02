<?php


namespace App\Http\Controllers\Common;

use App\Services\Bill\BillService;
use App\Services\PaymentServices\HttpHandlers\StripePayHandler;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Log;
use Stripe\Exception\SignatureVerificationException;
use UnexpectedValueException;

class WebhookController extends Controller
{
    private $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }


    public function rbk(Request $request)
    {
       $contentSignature = $request->header('Content-Signature');

       if ($contentSignature) {
          $rawContent = $request->all();
           $invoiceData = $rawContent['invoice'];
           if ($rawContent['eventType'] == 'InvoicePaid') {
               $this->billService->webhookStatusRbkPaid($invoiceData);
          }
       }
    }

    public function stripe(StripePayHandler $handler, Request $request)
    {
        try {
            $handler->handleWebhook($request);
        } catch (UnexpectedValueException $e) {
            Log::error('Invalid Stripe webhook payload');
            Log::error($request->getContent());
            abort(400);
        } catch (SignatureVerificationException $e) {
            Log::error('Invalid Stripe webhook signature');
            Log::error($request->getContent());
            abort(400);
        }
    }
}
