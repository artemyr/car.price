<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Requests\Review\UpdateRequest;
use App\Models\City;
use App\Models\Review;

class ReviewController extends AdminController
{
    public function create ()
    {
        $cities = City::all();

        $formControl = $this->getEditForm('', 'admin.review.store', [
            [
                'text',
                'title',
                '',
                'Название отзыва'
            ],
            [
                'select',
                'city_id',
                $cities,
                'Город отзыва',
                '',
            ],
            [
                'text',
                'link',
                '',
                'Ссылка отзыва'
            ],
            [
                'textarea',
                'content',
                '',
                'Контент отзыва'
            ],
            [
                'text',
                'author',
                '',
                'Автор отзыва'
            ],
            [
                'text',
                'cr_date',
                '',
                'Дата создания отзыва'
            ],
            [
                'text',
                'rate',
                '',
                'Оценка отзыва'
            ],
            [
                'text',
                'image_path',
                '',
                'Картинка отзыва'
            ],
            [
                'text',
                'author_ava',
                '',
                'Картинка отзыва'
            ],
        ]);

        return view('admin.form.create', compact('formControl'));
    }

    public function destroy (Review $review)
    {
        $review->delete();
        return redirect()->route('admin.review.index');
    }

    public function edit (Review $review)
    {
        $cities = City::all();

        $formControl = $this->getEditForm($review->id, 'admin.review.update', [
            [
                'text',
                'title',
                $review->title,
                'Название отзыва'
            ],
            [
                'select',
                'city_id',
                $cities,
                'Город отзыва',
                $review->city_id
            ],
            [
                'text',
                'link',
                $review->link,
                'Ссылка отзыва'
            ],
            [
                'textarea',
                'content',
                $review->content,
                'Контент отзыва'
            ],
            [
                'text',
                'author',
                $review->author,
                'Автор отзыва'
            ],
            [
                'text',
                'cr_date',
                $review->cr_date,
                'Дата создания отзыва'
            ],
            [
                'text',
                'rate',
                $review->rate,
                'Оценка отзыва'
            ],
            [
                'text',
                'image_path',
                $review->image_path,
                'Картинка отзыва'
            ],
            [
                'text',
                'author_ava',
                $review->author_ava,
                'Картинка отзыва'
            ],
        ]);
        $meta['h1'] = 'Отзыв';
        return view('admin.form.edit', compact('formControl','meta'));
    }

    public function index ()
    {
        $reviews = Review::all();
        $meta['h1'] = 'Отзывы';
        return view('admin.review.index', compact('reviews','meta'));
    }

    public function show (Review $review)
    {
        return view('admin.review.show', compact('review'));
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();

        $review = Review::create($data);

        return redirect()->route('admin.review.index');
    }

    public function update (UpdateRequest $request, Review $review)
    {
        $data = $request->validated();

        $review->update($data);

        // return redirect()->route('admin.review.show', $review->id);
        return redirect()->route('admin.review.index');
    }
}
