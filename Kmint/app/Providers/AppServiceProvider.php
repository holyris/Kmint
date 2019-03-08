<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//edit:yrs:- Needed for edit
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //edit:yrs:-we can edit column sizefor tables here
        \Schema::defaultStringLength(150);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
