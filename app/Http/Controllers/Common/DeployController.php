<?php


namespace App\Http\Controllers\Common;


use Illuminate\Routing\Controller;

class DeployController extends Controller
{
    public function autoUpdateMaster()
    {
        exec('cd /var/www/safeselling.ru/html/devcrm.safeselling.ru/delichev_crm && ./deploy.sh > autodeploy.log 2>&1', $output);
    }
}
