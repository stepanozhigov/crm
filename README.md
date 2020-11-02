Ознакомиться с фреймворком можно по ссылке [**https://laravel.com/docs/7.x**](https://laravel.com/docs/7.x)

*Запуск миграций вместе с начальными данными* 

`php artisan migrate:fresh --seed`

Будет создан дефолтовый пользователь 
>логин: admin@admin.com 
>пароль: admin

Установка npm зависимостей, запуск сборщика Laravel Mix

`nmp install`

`nmp run dev`

**Работа с ветками**

Каждая новая ветка под новую задачу отпочковывается от мастера

называется так ветка f-afonin-29.04.2020-user-registration

где f- функционал, afonin - фамилия, 29.04.2020 дата создания,и в конце описание фичи новой

при этом все ветки вливаются в дев мерджутся с флагом no-fast-forward

если нужно сделать hotfix то это будет новая ветка h-afonin-29.04.2020-fix-user-mode

h-hotifx, f-some functional ...

# **Horizon**
Небольшая админка для мониторинга работы очереди.

Запуск: php artisan horizon.

Мониторинг: crm.loc.laravel:8080/horizon, при этом доступ будет только у пользователя
с правом super admin
