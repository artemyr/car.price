# CAR PRICE

## ОБЩЕЕ
```
категории и города передаются глобально в /app/Providers/AppServiceProvider.php
пагинация подключена паетом /app/Providers/AppServiceProvider.php и редачится в /resources/views/vendor/pagination
```

## ПРИ ПЕРЕНОСЕ ИЛИ ИНИТЕ ПРОЕКТА
0. Вначале необходимо установить композер (и ноду если необходимо с ней работать)
1. затем отключить глобальные переменные в `app/Providers/AppServiceProvider.php`
2. отключить динамические урлы в `routes/web.php` типа таких `->where('city', \App\Models\City::getAllCitySlugs()`
3. затем убедится в наличии файла `.env` и правильной его конфигураии
4. Затем `composer install`, чтобы сформировать папку vendor
5. (Затем `npm i`, чтобы сформировать папку node_modules)
6. Затем `php artisan migrate:fresh --seed`, чтобы залить бд и исходные сущьности
7. вернуть файлы как было
8. /config/sanctum.php в stateful указать актуальный домен сайта
9. sail artisan storage:link сделать линк файловой системы

## CSS breakpoints
1330 1200 992 768 576

