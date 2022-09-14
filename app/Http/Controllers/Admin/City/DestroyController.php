<?php

namespace App\Http\Controllers\Admin\City;

use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke (City $city)
    {
        $city->delete();
        return redirect()->route('admin.city.index');
    }
}
