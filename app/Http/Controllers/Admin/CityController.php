<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Resources\Admin\City\Resource;
use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Models\City;

class CityController extends BaseController
{
    public function destroy (City $city)
    {
        $city->delete();
    }

    public function index ()
    {
        return Resource::collection(City::all());
    }

    public function show (City $city)
    {
        return new Resource($city);
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();
        City::create($data);
        return response([]);
    }

    public function update (UpdateRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);
        return response([]);
    }
}
