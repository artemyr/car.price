<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends AdminController
{
    public function __invoke ()
    {
        $formControll = $this->getEditForm('', 'admin.category.store', [
            [
                'text',
                'title',
                '',
                'Название категории'
            ],
            [
                'text',
                'link',
                '',
                'Ссылка ведущая на город'
            ],
            [
                'text',
                'subtitle',
                '',
                'Подпись города в банере'
            ],
            [
                'text',
                'icon',
                '',
                'Иконка'
            ],
        ]);

        $meta['h1'] = 'Создвне категории';
        return view('admin.form.create', compact('formControll','meta'));
    }
}
