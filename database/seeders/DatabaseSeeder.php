<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\City;
use App\Models\Article;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    private function createCities()
    {
        $data = [];
        $data[] = ['name' => 'Краснодар', 'link' => 'krasnodar', 'name_predloshniy_padesh' => 'Краснодаре'];
        $data[] = ['name' => 'Москва', 'link' => 'moskow', 'name_predloshniy_padesh' => 'Москве'];
        $data[] = ['name' => 'Санкт-Петербург', 'link' => 'saint-peterburg', 'name_predloshniy_padesh' => 'Санкт-Петербурге'];
        $data[] = ['name' => 'Ростов-на-Дону', 'link' => 'rostov-on-don', 'name_predloshniy_padesh' => 'Ростове-на-Дону'];

        $data[] = ['name' => 'Абакан', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Белгород', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Великий Новгород', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Владимир', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Волгоград', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Вологда', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Воронеж', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Дубна', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Домодедово', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Зеленоград', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Екатеринбург', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Иваново', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Ижевск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Йошкар-Ола', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['name' => 'Казань', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];

        foreach($data as $item)
            City::create($item);
    }

    private function createCategories()
    {
        $data = [];
        $data[] = ['title' => 'С проблемами', 'link' => 's-problemami', 'icon' => 'menu-icon-1','subtitle' => 'Автомобили с дефектами','city_id' => 1];
        $data[] = ['title' => 'По назначению', 'link' => 'po-naznacheniu', 'icon' => 'menu-icon-2','subtitle' => 'Для каких лиц предназначено','city_id' => 1];
        $data[] = ['title' => 'По кузову', 'link' => 'po-kuzovu', 'icon' => 'menu-icon-3','subtitle' => 'Виды автомобилей','city_id' => 1];
        $data[] = ['title' => 'По рулю', 'link' => 'po-rulu', 'icon' => 'menu-icon-4','subtitle' => 'Расположение руля в авто','city_id' => 1];

        foreach($data as $item)
            Category::create($item);
    }

    private function createPosts()
    {
        $data = [];
        $data[] =
        [
            'title' => 'Битые авто',
            'content' => 'объявление в городе краснодар категория битое авто',
            'likes' => 0,
            'city_id' => 1,
            'is_published' => 1,
            'category_id' => 1,
            'link' => 'bitie'
        ];
        $data[] =
        [
            'title' => 'Конфискованные и арестованные авто',
            'content' => 'объявление в городе москва категория битое авто',
            'likes' => 0,
            'city_id' => 2,
            'is_published' => 1,
            'category_id' => 1,
            'link' => 'konf'
        ];
        $data[] =
        [
            'title' => 'Залоги, кредиты, должники, банки',
            'content' => 'объявление в городе краснодар категория убитое авто',
            'likes' => 0,
            'city_id' => 1,
            'is_published' => 1,
            'category_id' => 2,
            'link' => 'zalog'
        ];
        $data[] =
        [
            'title' => 'Авто по банкротству',
            'content' => 'объявление в городе москва категория убитое авто',
            'likes' => 0,
            'city_id' => 2,
            'is_published' => 1,
            'category_id' => 2,
            'link' => 'bankr'
        ];
        $data[] =
        [
            'title' => 'Лизинговые авто',
            'content' => 'объявление в городе москва категория убитое авто',
            'likes' => 0,
            'city_id' => 2,
            'is_published' => 1,
            'category_id' => 2,
            'link' => 'liz'
        ];

        foreach($data as $item)
            Post::create($item);
    }

    private function createArticles()
    {
        $data = [];
        $data[] =
        [
            'title' => 'краснодар - статья 1',
            'content' => 'объявление в городе краснодар 1',
            'link' => 'kras-1',
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-2',
        ];
        $data[] =
        [
            'title' => 'Москва - статья 1',
            'content' => 'объявление в городе Москва 1',
            'link' => 'mos-1',
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-2',
        ];

        foreach($data as $item)
            Article::create($item);
    }

    private function createReviews()
    {
        $data = [];
        $data[] =
        [
            'title' => 'краснодар - отзыв 1',
            'content' => 'отзыв в городе краснодар 1',
        ];
        $data[] =
        [
            'title' => 'краснодар - отзыв 2',
            'content' => 'отзыв в городе краснодар 2',
        ];
        $data[] =
        [
            'title' => 'Москва - отзыв 1',
            'content' => 'отзыв в городе Москва 1',
        ];
        $data[] =
        [
            'title' => 'Москва - отзыв 2',
            'content' => 'отзыв в городе Москва 2',
        ];

        foreach($data as $item)
            Review::create($item);
    }

    public function run()
    {
        $this->createCities();
        $this->createCategories();
        $this->createPosts();
        $this->createArticles();
        $this->createReviews();

        // $tags = Tag::factory(6)->create();
        // foreach($posts as $post) {
        //     $tagsIds = $tags->random(5)->pluck('id');
        //     $post->tags()->attach($tagsIds);
        // }

        \App\Models\User::factory(1)->create();
    }
}
