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
use App\Models\MoreAskedQuestion;

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
        $data[] = ['title' => 'Краснодар', 'link' => 'krasnodar', 'name_predloshniy_padesh' => 'Краснодаре', 'coords' => '45.035470, 38.975313'];
        $data[] = ['title' => 'Москва', 'link' => 'moskow', 'name_predloshniy_padesh' => 'Москве', 'coords' => '55.76, 37.64'];
        $data[] = ['title' => 'Санкт-Петербург', 'link' => 'saint-peterburg', 'name_predloshniy_padesh' => 'Санкт-Петербурге', 'coords' => '59.938955, 30.315644'];
        $data[] = ['title' => 'Ростов-на-Дону', 'link' => 'rostov-on-don', 'name_predloshniy_padesh' => 'Ростове-на-Дону', 'coords' => '47.222078, 39.720358'];

        $data[] = ['title' => 'Абакан', 'link' => 'dev', 'name_predloshniy_padesh' => 'Абакане', 'coords' => '53.721152, 91.442396'];
        $data[] = ['title' => 'Белгород', 'link' => 'dev', 'name_predloshniy_padesh' => 'Белгороде', 'coords' => '50.595414, 36.587277'];
        $data[] = ['title' => 'Великий Новгород', 'link' => 'dev', 'name_predloshniy_padesh' => 'Великом новгороде', 'coords' => '58.522857, 31.269816'];
        $data[] = ['title' => 'Владимир', 'link' => 'dev', 'name_predloshniy_padesh' => 'Владимире', 'coords' => '56.129057, 40.406635'];
        $data[] = ['title' => 'Волгоград', 'link' => 'dev', 'name_predloshniy_padesh' => 'Волгограде', 'coords' => '48.707067, 44.516975'];
        $data[] = ['title' => 'Вологда', 'link' => 'dev', 'name_predloshniy_padesh' => 'Вологде', 'coords' => '59.220501, 39.891523'];
        $data[] = ['title' => 'Воронеж', 'link' => 'dev', 'name_predloshniy_padesh' => 'Воронеже', 'coords' => '51.660781, 39.200296'];
        $data[] = ['title' => 'Дубна', 'link' => 'dev', 'name_predloshniy_padesh' => 'Дубне', 'coords' => '56.736345, 37.162189'];
        $data[] = ['title' => 'Домодедово', 'link' => 'dev', 'name_predloshniy_padesh' => 'Домодедово', 'coords' => '55.413327, 37.906348'];
        $data[] = ['title' => 'Зеленоград', 'link' => 'dev', 'name_predloshniy_padesh' => 'Зленограде', 'coords' => '55.991893, 37.214390'];
        $data[] = ['title' => 'Екатеринбург', 'link' => 'dev', 'name_predloshniy_padesh' => 'Екатеренбурге', 'coords' => '56.838011, 60.597474'];
        $data[] = ['title' => 'Иваново', 'link' => 'dev', 'name_predloshniy_padesh' => 'Иваново', 'coords' => '57.000353, 40.973930'];
        $data[] = ['title' => 'Ижевск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Ижевске', 'coords' => '56.852676, 53.206900'];
        $data[] = ['title' => 'Йошкар-Ола', 'link' => 'dev', 'name_predloshniy_padesh' => 'Йошкар-Оле', 'coords' => '56.631600, 47.886178'];
        $data[] = ['title' => 'Казань', 'link' => 'dev', 'name_predloshniy_padesh' => 'Казане', 'coords' => '55.796127, 49.106414'];

        $data[] = ['title' => 'Клуга', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Красногорск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Курск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Коломна', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Липецк', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Люберцы', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Можайск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Мурманск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Мытици', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Набрежные Челны', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Нижний Новгород', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Новороссийск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Новосибирск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Обнинск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Одинцово', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Омск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Оренбург', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Пенза', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Пермь', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Петрозаводск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Подольск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Ростов-на-Дону', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Рязань', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Самара', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Саров', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Северодвинск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Сочи', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Стерлитамк', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Сургут', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Серпухов', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Ступино', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Тамбов', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Тверь', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Тольятти', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Тула', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Тюмень', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Ульяновск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Уфа', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Чебоксары', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Череповец', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Чехов', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Ярославль', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];

        foreach($data as $item)
            City::create($item);
    }

    private function createCategories()
    {
        $data = [];
        $data[] = ['title' => 'С проблемами', 'link' => 's-problemami', 'icon' => 'menu-icon-1','subtitle' => 'Автомобили с дефектами','parent_id' => 0, 'image' => 'uploads/images/banners/1.png'];
        $data[] = ['title' => 'По назначению', 'link' => 'po-naznacheniu', 'icon' => 'menu-icon-2','subtitle' => 'Для каких лиц предназначено','parent_id' => 0, 'image' => 'uploads/images/banners/2.png'];
        $data[] = ['title' => 'По кузову', 'link' => 'po-kuzovu', 'icon' => 'menu-icon-3','subtitle' => 'Виды автомобилей','parent_id' => 0, 'image' => 'uploads/images/banners/3.png'];
        $data[] = ['title' => 'По рулю', 'link' => 'po-rulu', 'icon' => 'menu-icon-4','subtitle' => 'Расположение руля в авто','parent_id' => 0, 'image' => 'uploads/images/banners/4.png'];

        $data[] = ['title' => 'Битые авто', 'link' => 'bitie', 'parent_id' => 1, 'image' => 'uploads/images/banners/5.png'];
        $data[] = ['title' => 'Конфискованные и арестованные авто', 'link' => 'konf', 'parent_id' => 1, 'image' => 'uploads/images/banners/6.png'];
        $data[] = ['title' => 'Залоги, кредиты, должники, банки', 'link' => 'zalog', 'parent_id' => 1, 'image' => 'uploads/images/banners/7.png'];
        $data[] = ['title' => 'Авто по банкротству', 'link' => 'bankr', 'parent_id' => 1, 'image' => 'uploads/images/banners/8.png'];
        $data[] = ['title' => 'Лизинговые авто', 'link' => 'liz', 'parent_id' => 1, 'image' => 'uploads/images/banners/9.png'];

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
            'title' => 'Разнообразный и богатый опыт говорит нам, что реализация намеченных плановых заданий играя на фортепиано он увидел',
            'content' => '
            <h2>Первый подзаголовок</h2>
            <p>Повседневная практика показывает, что сплочённость команды профессионалов позволяет оценить значение укрепления моральных ценностей.</p>
            <p>Но интерактивные прототипы лишь добавляют фракционных разногласий и призваны к ответу. Современные технологии достигли такого уровня, что убеждённость некоторых оппонентов напрямую зависит от новых предложений.</p>
            <ul>
                <li>В норме ли уровень pH? (рекомендуемые значения: 7,0–7,4)</li>
                <li>Не засорился ли фильтр? (песочный фильтр: обратная промывка; патронный фильтр: промывание;)</li>
                <li>Нормально ли функционирует система водоподготовки (машинное время работы фильтра соответствует объёму бассейна)</li>
            </ul>
            <h2>Второй подзаголовок</h2>
            <p>Полностью перестроили IT-структуру предприятия. Приобрели и настроили сервер виртуальных машин, на котором запустили:</p>
            <ol>
                <li>Гарантийное и послегарантийное обслуживание оборудования бассейнов</li>
                <li>Заключение и работа по сервисным договорам</li>
                <li>Заключение и работа по сервисным договорам</li>
                <li>Приём заявок от клиентов на работы с оборудованием и водой бассейнов (ремонт, модернизация, установка параметров воды, консервация бассейнов на зиму, расконсервация бассейнов после зимы, чистка бассейнов, монтаж сборных бассейнов, консультация и другие виды работ)</li>
                <li>Консультации по телефону по оборудованию бассейнов и уходу за водой бассейнов</li>
            </ol>
            ',
            'link' => 'kras-1',
            'preview_text' => 'Разнообразный и богатый опыт говорит нам, что реализация намеченных плановых заданий играя на фортепиано он увидел',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/1.jpg'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-2',
            'preview_text' => 'Однозначно, ключевые особенности структуры проекта могут быть смешаны с не уникальными данными до степени совершенной',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/2.jpg'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-3',
            'preview_text' => 'Имеется спорная точка зрения, гласящая примерно следующее: реплицированные',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/3.jpg'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-4',
            'preview_text' => 'Есть над чем задуматься: тщательные исследования конкурентов',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/4.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 1',
            'content' => 'объявление в городе Москва 1',
            'link' => 'mos-1',
            'preview_text' => 'Разнообразный и богатый',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/5.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-2',
            'preview_text' => 'Учитывая ключевые сценарии поведения, выбранный нами инновационный',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/6.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-3',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/1.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-4',
            'preview_text' => 'Идейные соображения высшего порядка, а также укрепление и развитие внутренней структуры является качественно новой ступенью.',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/2.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-5',
            'preview_text' => 'В частности, граница обучения кадров создаёт предпосылки для вывода текущих активов',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/3.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-6',
            'preview_text' => 'В частности, граница обучения кадров создаёт предпосылки для вывода текущих активов',
            'cr_date' => '30.07.2022',
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
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 1,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/1.jpg'
        ];
        $data[] =
        [
            'title' => 'Удачно поставила',
            'link' => 'city2',
            'content' => 'Являясь всего лишь частью общей картины, диаграммы связей и по сей день остаются уделом либералов, которые жаждут быть заблокированы в рамках своих собственных рациональных ограничений.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 2,
            'author_ava' => 'img/preson.jpg',
        ];
        $data[] =
        [
            'title' => 'Удачно поставила',
            'link' => 'city2',
            'content' => 'Являясь всего лишь частью общей картины, диаграммы связей и по сей день остаются уделом либералов, которые жаждут быть заблокированы в рамках своих собственных рациональных ограничений.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 2,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/2.jpg'
        ];
        $data[] =
        [
            'title' => 'Хорошая машина',
            'link' => 'city3',
            'content' => 'Значимость этих проблем настолько очевидна, что постоянный количественный рост и сфера нашей активности создаёт необходимость включения в производственный план целого ряда.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 3,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/3.jpg'
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city4',
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 4,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/4.jpg'
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city4',
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 5,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/5.jpg'
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city5',
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 5,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/6.jpg'
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city6',
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 5,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/6.jpg'
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city7',
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 5,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/6.jpg'
        ];
        $data[] =
        [
            'title' => 'Могло быть и лучше',
            'link' => 'city8',
            'content' => 'Наше дело не так однозначно, как может показаться: высокотехнологичная концепция общественного уклада играет определяющее значение для позиций, занимаемых участниками в отношении поставленных задач.',

            'author' => 'Сурен Багодуровичь',
            'cr_date' => '30.08.2021',
            'rate' => 5,
            'author_ava' => 'img/preson.jpg',
            'preview_image' => 'uploads/images/reviews/6.jpg'
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
            'coords' => '44.683864, 37.786519'
        ];
        $data[] =
        [
            'city' => 'Москва',
            'address' => 'Московская область, г. Москва, ул. Мантулинская, дом 12',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'coords' => '55.756888, 37.553693'
        ];
        $data[] =
        [
            'city' => 'Краснодар',
            'address' => 'Краснодарский край, г. Краснодар, ул. Красных Партизан, 216',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'coords' => '45.049313, 38.967121'
        ];

        $data[] =
        [
            'city' => 'Новороссийск',
            'address' => 'Краснодарский край, г. Новороссийск, ул. Вербовая, дом 9',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'coords' => '1, 1'
        ];
        $data[] =
        [
            'city' => 'Москва',
            'address' => 'Московская область, г. Москва, ул. Мантулинская, дом 12',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'coords' => '2, 2'
        ];
        $data[] =
        [
            'city' => 'Краснодар',
            'address' => 'Краснодарский край, г. Краснодар, ул. Красных Партизан, 216',
            'phone' => '8 861 205-02-25',
            'work_time' => 'Ежедневно 10:00–20:00',
            'coords' => '3, 3'
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

    private function createMoreAskedQuestions()
    {
        $data = [];
        $data[] =
        [
            'question' => 'Что такое онлайн займ?',
            'answer' => "Порой, человек попадает в такие обстоятельства, когда деньги нужны не просто срочно, а немедленно. Что делать в такой ситуации? Банки в этом случае не помогут, так как процедура рассмотрения заявки и весь процесс достаточно длителен.<br>
            Выйти из затруднительного финансового положения, можно взяв займ денег онлайн. Достаточно иметь паспорт, доступ в интернет и пару минут свободного времени.",
        ];
        $data[] =
        [
            'question' => 'Что такое онлайн займ?',
            'answer' => "2Порой, человек попадает в такие обстоятельства, когда деньги нужны не просто срочно, а немедленно. Что делать в такой ситуации? Банки в этом случае не помогут, так как процедура рассмотрения заявки и весь процесс достаточно длителен.<br>
            Выйти из затруднительного финансового положения, можно взяв займ денег онлайн. Достаточно иметь паспорт, доступ в интернет и пару минут свободного времени.",
        ];
        $data[] =
        [
            'question' => 'Что такое онлайн займ?',
            'answer' => "3Порой, человек попадает в такие обстоятельства, когда деньги нужны не просто срочно, а немедленно. Что делать в такой ситуации? Банки в этом случае не помогут, так как процедура рассмотрения заявки и весь процесс достаточно длителен.<br>
            Выйти из затруднительного финансового положения, можно взяв займ денег онлайн. Достаточно иметь паспорт, доступ в интернет и пару минут свободного времени.",
        ];
        $data[] =
        [
            'question' => 'Что такое онлайн займ?',
            'answer' => "4Порой, человек попадает в такие обстоятельства, когда деньги нужны не просто срочно, а немедленно. Что делать в такой ситуации? Банки в этом случае не помогут, так как процедура рассмотрения заявки и весь процесс достаточно длителен.<br>
            Выйти из затруднительного финансового положения, можно взяв займ денег онлайн. Достаточно иметь паспорт, доступ в интернет и пару минут свободного времени.",
        ];

        foreach($data as $item)
            MoreAskedQuestion::create($item);
    }

    private function createTags()
    {
        $data = [];
        $data[] =
        [
            'title' => 'СДЕЛКИ',
            'color' => 'purple',
        ];
        $data[] =
        [
            'title' => 'БЕЗОПАСНОСТЬ',
            'color' => 'blue',
        ];
        $data[] =
        [
            'title' => 'НОВОСТИ',
            'color' => 'green',
        ];
        $data[] =
        [
            'title' => 'СТРАХОВАНИЕ',
            'color' => 'gray',
        ];
        $data[] =
        [
            'title' => 'АКЦИИ',
            'color' => 'orange',
        ];

        foreach($data as $item)
            Tag::create($item);
    }

    public function run()
    {
        $this->createCities();
        $this->createCategories();
//        $this->createPosts();
        $this->createTags();
        $this->createArticles();
        $this->createReviews();
        $this->createCarpriceOfficeAddress();
        $this->createGlobalSettings();
        $this->createMoreAskedQuestions();

//         $tags = Tag::factory(6)->create();
//         foreach($posts as $post) {
//             $tagsIds = $tags->random(5)->pluck('id');
//             $post->tags()->attach($tagsIds);
//         }

        $articles = Article::all();
        $tags = Tag::all();
         foreach($articles as $article) {
             $tagsIds = $tags->random(1)->pluck('id');
             $article->tags()->attach($tagsIds);
         }

        \App\Models\User::factory(1)->create();
    }
}
