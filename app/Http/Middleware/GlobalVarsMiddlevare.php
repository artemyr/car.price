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
        $this->cities();
        $this->addresses();
        $this->globals();
        $this->paginator();
        $this->menu(City::where('link', $request->route('city'))->first());

        return $next($request);
    }

    private function menu ($city) {
        $menu = [];

        if (!$city) $city = City::where('id', '1')->firstOrFail();

        $categories = $city->categories();

        foreach ($categories as $category){
            $subcategories = [];
            foreach ($category->subcategories as $subcat) {
                $subcategories[] = (object)[
                    'link' => route('category', [$city->link , $subcat->link]),
                    'title' => $subcat->title,
                ];
            }

            $menu[] = (object)[
                'link' => route('category', [$city->link, $category->link]),
                'title' => $category->title,
                'icon' => $category->icon,
                'subtitle' => $category->subtitle,
                'subcategories' => $subcategories
            ];
        }

        \View::share('categories', $menu);
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
