<?php

namespace App\Providers;

use App\Modeles\ProductCategoryDAO;
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
        $productCategoryDAO = new ProductCategoryDAO();
        $productCategories = $productCategoryDAO->getAll();
        View::share('productCategories', $productCategories);
        Schema::defaultStringLength(255);
    }
}
