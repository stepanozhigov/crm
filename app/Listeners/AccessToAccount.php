<?php

namespace App\Listeners;

use App\Events\BillPaid;
use App\Mail\GiveAccessMail;
use App\Models\Client;
use App\Services\Auth\ClientService;
use App\Services\Product\ProductService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AccessToAccount implements ShouldQueue
{
    protected $clientService;
    protected $productService;

    public function __construct(ClientService $clientService, ProductService $productService)
    {
        $this->clientService = $clientService;
        $this->productService = $productService;
    }

    public function handle(BillPaid $event)
    {
        /** @var Client $client */
        $bill = $event->bill;
        $client = $bill->client;
        $project = $bill->product->project;
        $locale = $project->language;

        if (!$client->isActive()) {
            $tmpPassword = $this->clientService->giveAccess($client, $project);
            Mail::to($client)
                ->locale($locale)
                ->send(new GiveAccessMail($client, $bill, $tmpPassword));
        }

        $products = $this->clientService->openProductsAfterPayed($client, $bill);
        $this->productService->coauthorsAttach($products, $bill);
    }
}
