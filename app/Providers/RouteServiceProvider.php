<?php

namespace App\Providers;

use App\Models\Bill;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespaceLK = 'App\Http\Controllers\LK';
    protected $namespaceCrm = 'App\Http\Controllers\Crm';
    protected $namespace = 'App\Http\Controllers\Common';

    public const HOME = '/';

    public function boot()
    {
        parent::boot();
        Route::pattern('id', '[0-9]+');
        Route::bind('bill', function ($value) {
            return Bill::where('id', base64_decode(strtr($value, '._-', '+/=')))->with(['products', 'client', 'product', 'paymentSystem'])->firstOrFail();
        });

    }


    public function map()
    {
        $this->mapApiRoutes();

        $this->mapLKRoutes();
        $this->mapCrmRoutes();
        $this->mapWebRoutes();
    }


    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/common.php'));
    }

    protected function mapCrmRoutes()
    {
        Route::middleware('web')
            ->domain(env('CRM_DOMAIN'))
            ->namespace($this->namespaceCrm)
            ->group(base_path('routes/crm.php'));
    }

    protected function mapLKRoutes()
    {
        Route::middleware('web')
            ->domain(env('LK_DOMAIN'))
            ->namespace($this->namespaceLK)
            ->group(base_path('routes/lk.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

}
