<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Models\City;
use App\Models\Category;
use App\Services\Base\Service;

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
    public function boot(Service $service)
    {
        $cities = City::all();
        \View::share('cities', $cities);
        \View::share('dividedCities', $service->dividedCities($cities));
        \View::share('categories', Category::all());

        Paginator::defaultView('vendor.pagination.default');
    }
}
