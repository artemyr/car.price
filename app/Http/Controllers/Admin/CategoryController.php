<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Resources\Admin\Category\Resource;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function create ()
    {
        $formControl = $this->getEditForm('', 'admin.category.store', [
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
        return view('admin.form.create', compact('formControl','meta'));
    }

    public function destroy (Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function edit (Category $category)
    {
        $formControl = $this->getEditForm($category->id, 'admin.category.update', [
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
        return view('admin.form.edit', compact('formControl','meta'));
    }

    public function index ()
    {
        return Resource::collection(Category::all());
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        return redirect()->route('admin.category.index');
    }

    public function update (UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        // return redirect()->route('admin.category.show', $category->id);
        return redirect()->route('admin.category.index');
    }
}
