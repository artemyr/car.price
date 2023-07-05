# CAR PRICE

## ОБЩЕЕ
```
категории и города передаются глобально в /app/Providers/AppServiceProvider.php
пагинация подключена паетом /app/Providers/AppServiceProvider.php и редачится в /resources/views/vendor/pagination
```

## ПРИ ПЕРЕНОСЕ ИЛИ ИНИТЕ ПРОЕКТА
0. Вначале необходимо установить композер (и ноду если необходимо с ней работать)
1. тем убедится в наличии файла `.env` и правильной его конфигураии
2. Затем `composer install`, чтобы сформировать папку vendor
3. (Затем `npm i`, чтобы сформировать папку node_modules)
4. Затем `php artisan migrate:fresh --seed`, чтобы залить бд и исходные сущьности
5. вернуть файлы как было
6. /config/sanctum.php в stateful указать актуальный домен сайта
7. sail artisan storage:link сделать линк файловой системы

## CSS breakpoints
1330 1200 992 768 576

## ЗАДАЧИ
1. /resources/views/includes/staticInfo.blade.php в самом начале есть меню для мобилки, но сейчас оно статично
2. в отзывах и статьях по идее нужен слайдер и сделать им свойство "фотогаллерея"
3. redis
4. пагинация в отзывах и статьях
