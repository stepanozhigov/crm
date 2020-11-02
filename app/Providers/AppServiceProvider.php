<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\Forms\UserForm;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('alert', Alert::class);
        Blade::component('userForm', UserForm::class);
    }
}
