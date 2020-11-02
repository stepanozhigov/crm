<?php

namespace App\Http\Controllers\Crm;


class SalesReportController extends Controller
{
    public function index()
    {
        return view('crm.sales-report.index');
    }
}
