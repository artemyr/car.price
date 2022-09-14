<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Admin\City\BaseController;
use App\Http\Requests\City\StoreRequest;
use Illuminate\Http\Request;
use App\Models\City;

class StoreController extends BaseController
{
    public function __invoke (StoreRequest $request)
    {
        $data = $request->validated();

        $city = City::create($data);

        return redirect()->route('admin.city.index');
    }
}
