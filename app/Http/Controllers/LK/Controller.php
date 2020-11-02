<?php

namespace App\Http\Controllers\LK;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $subdomain;

    public function __construct(Request $request)
    {
        $this->subdomain = $this->getSubdomain($request);
    }

    private function getSubdomain(Request $request)
    {
        $host = $request->server->get('HTTP_HOST');
        return substr($host, 0, strpos($host, '.')+1);
    }
}
