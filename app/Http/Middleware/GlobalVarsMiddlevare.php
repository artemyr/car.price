<?php

namespace App\Http\Middleware;

use App\Models\CarpriceOfficeAddrass;
use App\Models\City;
use App\Models\Category;
use App\Models\GlobalSetting;
use Closure;
use Illuminate\Http\Request;
use App\Services\Base\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class GlobalVarsMiddlevare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $this->cities();
        $this->city(City::where('link', $request->route('city'))->first());
        $this->addresses();
        $this->globals();
        $this->paginator();
        $this->menu();


        return $next($request);
    }

    private function menu () {
//        View::composer('layouts.main', function ($view) {
//            $view->with('categories', Category::with('children')->where('parent_id', 0)->get());
//        });
        \View::share('categories', Category::with('children')->where('parent_id', 0)->get());
    }

    private function city ($city) {
       if ($city) \View::share('city', $city);
        else \View::share('city', City::where('id', 1)->first());
    }

    private function cities () {
        $cities = City::all();
        $service = new Service;

        \View::share('cities', $cities);
        \View::share('dividedCities', $service->dividedCities($cities));
//        \View::share('categories', Category::all());  //already is'n general (uses cities selection)
    }

    private function addresses () {
        \View::share('capriceOfficeAddresses', CarpriceOfficeAddrass::all());
    }

    private function globals () {
        \View::share('partner_link', GlobalSetting::where('code','partner_link')->first());
        \View::share('video_link', GlobalSetting::where('code','video_link')->first());
    }

    private function paginator () {
        Paginator::defaultView('vendor.pagination.articles');
    }
}
