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
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('money', function ($amount) {
            return number_format($amount, 2, '.', ',');
        });
    }
}
