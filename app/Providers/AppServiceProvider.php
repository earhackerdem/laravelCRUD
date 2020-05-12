<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Añadido para solucionar problema de migracion 1071
use Illuminate\Support\Facades\Schema;
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
        //Añadido para solucionar problema de migracion 1071
        Schema::defaultStringLength(191);
    }
}
