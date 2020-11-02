<?php

namespace App\Http\Controllers\Common;

use Illuminate\Routing\Controller;


class LandingController extends Controller
{

    public function index()
    {
        return view('common.landing');
    }

    public function vm()
    {
//        return view('common.vm', ['productId' => 43]);
        return view('common.vm', ['productId' => 125]);
    }

    public function vd()
    {
        return view('common.vd', ['productId' => 44]);
    }

    public function vz()
    {
        return view('common.vz', ['productId' => 45]);
    }

}
