<?php

namespace App\Http\Controllers\Admin\City;

use App\Models\City;
use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\City\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke (UpdateRequest $request, City $city)
    {
        $data = $request->validated();

        $city->update($data);

        // return redirect()->route('admin.city.show', $city->id);
        return redirect()->route('admin.city.index');
    }
}
