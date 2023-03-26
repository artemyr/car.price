<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Controllers\Controller;
use App\Models\City;

class EditController extends BaseController
{
    public function __invoke (City $city)
    {
        $formControll = $this->getEditForm($city->id, 'admin.city.update', [
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

        return view('admin.city.edit', compact('formControll'));
    }
}
