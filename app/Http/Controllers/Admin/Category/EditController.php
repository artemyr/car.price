<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Category;

class EditController extends AdminController
{
    public function __invoke (Category $category)
    {
        $formControll = $this->getEditForm($category->id, 'admin.category.update', [
            [
                'text',
                'title',
                $category->title,
                'Название категории'
            ],
            [
                'text',
                'link',
                $category->link,
                'Ссылка ведущая на город'
            ],
            [
                'text',
                'subtitle',
                $category->subtitle,
                'Подпись города в банере'
            ],
            [
                'text',
                'icon',
                $category->icon,
                'Иконка'
            ],
        ]);
        $meta['h1'] = 'Категория';
        return view('admin.form.edit', compact('formControll','meta'));
    }
}
