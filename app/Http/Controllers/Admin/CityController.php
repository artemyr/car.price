<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Admin\BaseController;
use \App\Http\Resources\Admin\City\Resource;
use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Models\City;

class CityController extends BaseController
{
    public function create ()
    {
        $formControl = $this->getEditForm('', 'admin.city.store', [
            [
                'text',
                'title',
                '',
                'Название города'
            ],
            [
                'text',
                'link',
                '',
                'Ссылка ведущая на город'
            ],
            [
                'text',
                'name_predloshniy_padesh',
                '',
                'Город в предложном падеже'
            ],
        ]);
        $meta['h1'] = 'Создать пост';

        return view('admin.form.create', compact('formControl','meta'));
    }

    public function destroy (City $city)
    {
        $city->delete();
        // return redirect()->route('admin.city.index');
    }

    public function edit (City $city)
    {
        $formControl = $this->getEditForm($city->id, 'admin.city.update', [
            [
                'text',
                'title',
                $city->title,
                'Название города'
            ],
            [
                'text',
                'link',
                $city->link,
                'Ссылка ведущая на город'
            ],
            [
                'text',
                'name_predloshniy_padesh',
                $city->name_predloshniy_padesh,
                'Город в предложном падеже'
            ],
        ]);
        $meta['h1'] = 'Пост';

        return view('admin.form.edit', compact('formControl','meta'));
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
        // return redirect()->route('admin.city.index');
    }

    public function update (UpdateRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);
        return response([]);
        // return redirect()->route('admin.city.show', $city->id);
        // return redirect()->route('admin.city.index');
    }
}
