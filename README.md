# CAR PRICE

## ОБЩЕЕ
```
категории и города передаются глобально в /app/Providers/AppServiceProvider.php
пагинация подключена паетом /app/Providers/AppServiceProvider.php и редачится в /resources/views/vendor/pagination
```

## ПРИ ПЕРЕНОСЕ ИЛИ ИНИТЕ ПРОЕКТА
0. Вначале необходимо установить композер (и ноду если необходимо с ней работать)
1. Затем `composer install`, чтобы сформировать папку vendor
2. (Затем `npm i`, чтобы сформировать папку node_modules)
3. Затем `php artisan migrate:fresh --seed`, чтобы залить бд и исходные сущьности

## CSS breakpoints
1330 1200 992 768 576

