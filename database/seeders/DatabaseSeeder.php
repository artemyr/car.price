<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\City;
use App\Models\Article;
use App\Models\Review;
use App\Models\CarpriceOfficeAddrass;
use App\Models\GlobalSetting;

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
            'city_id' => 1,
            'tag' => 'Безопасность',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени.',
            'cr_date' => '30.07.2022',
            'image_path' => 'img/car2.jpg',
            'content' => '123'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-2',
            'city_id' => 1,
            'tag' => 'Безопасность',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени.',
            'cr_date' => '30.07.2022',
            'image_path' => 'img/car2.jpg',
            'content' => '123'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-3',
            'city_id' => 1,
            'tag' => 'Безопасность',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени.',
            'cr_date' => '30.07.2022',
            'image_path' => 'img/car2.jpg',
            'content' => '123'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-4',
            'city_id' => 1,
            'tag' => 'Безопасность',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени.',
            'cr_date' => '30.07.2022',
            'image_path' => 'img/car2.jpg',
            'content' => '123'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 1',
            'content' => 'объявление в городе Москва 1',
            'link' => 'mos-1',
            'city_id' => 2,
            'tag' => 'Безопасность',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени.',
            'cr_date' => '30.07.2022',
            'image_path' => 'img/car2.jpg',
            'content' => '123'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-2',
            'city_id' => 2,
            'tag' => 'Безопасность',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени.',
            'cr_date' => '30.07.2022',
            'image_path' => 'img/car2.jpg',
            'content' => '123'
        ];

        foreach($data as $item)
            Article::create($item);
    }

    private function createReviews()
    {
        $data = [];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city1',
            'city_id' => 1,
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 3,
            'image_path' => 'img/car.jpg',
            'author_ava' => 'img/preson.jpg',
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city2',
            'city_id' => 1,
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 4,
            'image_path' => 'img/car.jpg',
            'author_ava' => 'img/preson.jpg',
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city3',
            'city_id' => 1,
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 3,
            'image_path' => 'img/car.jpg',
            'author_ava' => 'img/preson.jpg',
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city4',
            'city_id' => 1,
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 3,
            'image_path' => 'img/car.jpg',
            'author_ava' => 'img/preson.jpg',
        ];
        
        foreach($data as $item)
            Review::create($item);
    }

    private function createCarpriceOfficeAddress()
    {
        $data = [];
        $data[] =
        [
            'city' => 'Новороссийск',
            'address' => 'Краснодарский край, г. Новороссийск, ул. Вербовая, дом 9',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'link' => '123',
        ];
        $data[] =
        [
            'city' => 'Москва',
            'address' => 'Московская область, г. Москва, ул. Мантулинская, дом 12 ',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'link' => '123',
        ];
        $data[] =
        [
            'city' => 'Новороссийск',
            'address' => 'Краснодарский край, г. Новороссийск, ул. Вербовая, дом 9',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'link' => '123',
        ];
        $data[] =
        [
            'city' => 'Москва',
            'address' => 'Московская область, г. Москва, ул. Мантулинская, дом 12 ',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'link' => '123',
        ];
        $data[] =
        [
            'city' => 'Новороссийск',
            'address' => 'Краснодарский край, г. Новороссийск, ул. Вербовая, дом 9',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'link' => '123',
        ];
        $data[] =
        [
            'city' => 'Москва',
            'address' => 'Московская область, г. Москва, ул. Мантулинская, дом 12 ',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'link' => '123',
        ];

        foreach($data as $item)
            CarpriceOfficeAddrass::create($item);
    }

    private function createGlobalSettings()
    {
        $data = [];
        $data[] =
        [
            'code' => 'partner_link',
            'name' => 'Ссылка партнера CarPrice',
            'value' => 'https://carprice.ru/link',
        ];
        $data[] =
        [
            'code' => 'video_link',
            'name' => 'Ссылка на видео',
            'value' => 'https://carprice.ru/video',
        ];

        foreach($data as $item)
            GlobalSetting::create($item);
    }

    public function run()
    {
        $this->createCities();
        $this->createCategories();
        $this->createPosts();
        $this->createArticles();
        $this->createReviews();
        $this->createCarpriceOfficeAddress();
        $this->createGlobalSettings();

        // $tags = Tag::factory(6)->create();
        // foreach($posts as $post) {
        //     $tagsIds = $tags->random(5)->pluck('id');
        //     $post->tags()->attach($tagsIds);
        // }

        \App\Models\User::factory(1)->create();
    }
}
