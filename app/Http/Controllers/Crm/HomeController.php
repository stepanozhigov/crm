<?php

namespace App\Http\Controllers\Crm;


class HomeController extends Controller
{

    public function index()
    {
        return view('crm.home');
    }
}
