<?php

namespace App\Http\Controllers\Common;

use App\Models\Webinar;
use Illuminate\Routing\Controller;

class WebinarController extends Controller
{

    public function index(Webinar $webinar)
    {
        return view('common.webinar.index', compact('webinar'));
    }

}
