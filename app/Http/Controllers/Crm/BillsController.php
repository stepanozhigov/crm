<?php

namespace App\Http\Controllers\Crm;

use App\Models\Bill;
use App\Models\Client;
use App\Services\Bill\BillService;
use Arr;
use Illuminate\Http\Request;
use Str;
use Symfony\Component\Finder\Finder;

class BillsController extends Controller
{

    protected $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function index()
    {
        return view('crm.bills.index');
    }

    public function create()
    {
        $clients = Client::pluck('name', 'id')->all();

        return view('crm.bills.create', compact('clients'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Bill $bill)
    {
        //
    }

    public function edit(Bill $bill)
    {
        //
    }

    public function update(Request $request, Bill $bill)
    {
        //
    }

    public function destroy(Bill $bill)
    {
        //
    }
}
