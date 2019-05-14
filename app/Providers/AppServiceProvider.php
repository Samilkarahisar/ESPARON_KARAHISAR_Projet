<?php

namespace App\Providers;

use App\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
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
        $productCategories = ProductCategory::all();
        View::share('productCategories', $productCategories);
        Schema::defaultStringLength(255);
    }
}
