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
        $data[] = ['title' => 'Краснодар', 'link' => 'krasnodar', 'name_predloshniy_padesh' => 'Краснодаре'];
        $data[] = ['title' => 'Москва', 'link' => 'moskow', 'name_predloshniy_padesh' => 'Москве'];
        $data[] = ['title' => 'Санкт-Петербург', 'link' => 'saint-peterburg', 'name_predloshniy_padesh' => 'Санкт-Петербурге'];
        $data[] = ['title' => 'Ростов-на-Дону', 'link' => 'rostov-on-don', 'name_predloshniy_padesh' => 'Ростове-на-Дону'];

        $data[] = ['title' => 'Абакан', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Белгород', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Великий Новгород', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Владимир', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Волгоград', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Вологда', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Воронеж', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Дубна', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Домодедово', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Зеленоград', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Екатеринбург', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Иваново', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Ижевск', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Йошкар-Ола', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];
        $data[] = ['title' => 'Казань', 'link' => 'dev', 'name_predloshniy_padesh' => 'Городе'];

        foreach($data as $item)
            City::create($item);
    }

    private function createCategories()
    {
        $data = [];
        $data[] = ['title' => 'С проблемами', 'link' => 's-problemami', 'icon' => 'menu-icon-1','subtitle' => 'Автомобили с дефектами', 'depth' => 1];
        $data[] = ['title' => 'По назначению', 'link' => 'po-naznacheniu', 'icon' => 'menu-icon-2','subtitle' => 'Для каких лиц предназначено', 'depth' => 1];
        $data[] = ['title' => 'По кузову', 'link' => 'po-kuzovu', 'icon' => 'menu-icon-3','subtitle' => 'Виды автомобилей', 'depth' => 1];
        $data[] = ['title' => 'По рулю', 'link' => 'po-rulu', 'icon' => 'menu-icon-4','subtitle' => 'Расположение руля в авто', 'depth' => 1];

        $data[] = ['title' => 'Битые авто', 'link' => 'bitie', 'depth' => 2, 'parent_id' => 1];
        $data[] = ['title' => 'Конфискованные и арестованные авто', 'link' => 'konf', 'depth' => 2, 'parent_id' => 1];
        $data[] = ['title' => 'Залоги, кредиты, должники, банки', 'city_id' => 1, 'link' => 'zalog', 'depth' => 2, 'parent_id' => 1];
        $data[] = ['title' => 'Авто по банкротству', 'link' => 'bankr', 'depth' => 2, 'parent_id' => 1];
        $data[] = ['title' => 'Лизинговые авто', 'link' => 'liz', 'depth' => 2, 'parent_id' => 1];

        $data[] = ['title' => 'Категория только для москвы', 'city_id' => 2, 'link' => 'liz', 'depth' => 2, 'parent_id' => 1];

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
            'city_id' => 1,
            'tag' => 'Сделки',
            'preview_text' => 'Разнообразный и богатый опыт говорит нам, что реализация намеченных плановых заданий играя на фортепиано он увидел',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/1.jpg'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-2',
            'city_id' => 1,
            'tag' => 'Безопасность',
            'preview_text' => 'Однозначно, ключевые особенности структуры проекта могут быть смешаны с не уникальными данными до степени совершенной',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/2.jpg'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-3',
            'city_id' => 1,
            'tag' => 'Новости',
            'preview_text' => 'Имеется спорная точка зрения, гласящая примерно следующее: реплицированные',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/3.jpg'
        ];
        $data[] =
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-4',
            'city_id' => 1,
            'tag' => 'Страхование',
            'preview_text' => 'Есть над чем задуматься: тщательные исследования конкурентов',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/4.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 1',
            'content' => 'объявление в городе Москва 1',
            'link' => 'mos-1',
            'city_id' => 2,
            'tag' => 'Сделки',
            'preview_text' => 'Разнообразный и богатый',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/5.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-2',
            'city_id' => 2,
            'tag' => 'Акции',
            'preview_text' => 'Учитывая ключевые сценарии поведения, выбранный нами инновационный',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/6.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-3',
            'city_id' => 2,
            'tag' => 'Безопасность',
            'preview_text' => 'Вот вам яркий пример современных тенденций — курс на социально-ориентированный национальный проект в значительной степени',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/1.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-4',
            'city_id' => 2,
            'tag' => 'Новости',
            'preview_text' => 'Идейные соображения высшего порядка, а также укрепление и развитие внутренней структуры является качественно новой ступенью.',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/2.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-5',
            'city_id' => 2,
            'tag' => 'Сделки',
            'preview_text' => 'В частности, граница обучения кадров создаёт предпосылки для вывода текущих активов',
            'cr_date' => '30.07.2022',
            'preview_image' => 'uploads/images/articles/3.jpg'
        ];
        $data[] =
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-6',
            'city_id' => 2,
            'tag' => 'Безопасность',
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
            'city_id' => 1,
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
