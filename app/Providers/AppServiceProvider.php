<?php

namespace App\Providers;

use App\Services\ProductService;
use App\Services\ProductInterface;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            $this->app->bind(ProductInterface::class, ProductService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
