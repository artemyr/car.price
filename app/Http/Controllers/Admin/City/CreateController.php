<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends AdminController
{
    public function __invoke ()
    {
        $formControll = $this->getEditForm('', 'admin.city.store', [
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

        return view('admin.form.create', compact('formControll','meta'));
    }
}
