<?php

namespace App\Http\Middleware;

use App\Models\CarpriceOfficeAddrass;
use App\Models\City;
use App\Models\GlobalSetting;
use Closure;
use Illuminate\Http\Request;
use App\Services\Base\Service;
use Illuminate\Pagination\Paginator;

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
        $service = new Service;

        $cities = City::all();
        $capriceOfficeAddresses = CarpriceOfficeAddrass::all();

        \View::share('cities', $cities);
        \View::share('dividedCities', $service->dividedCities($cities));
//        \View::share('categories', Category::all());  //already is'n general (uses cities selection)
        \View::share('capriceOfficeAddresses', $capriceOfficeAddresses);

        //gloval config
        \View::share('partner_link', GlobalSetting::where('code','partner_link')->first());
        \View::share('video_link', GlobalSetting::where('code','video_link')->first());

        Paginator::defaultView('vendor.pagination.articles');

        return $next($request);
    }
}
