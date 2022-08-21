### ТЗ (Credit Europa Bank)

1. Установка зависимостей проекта
```php 
$ composer install
```

2. Конфигурация базы данных в файле ```.env``` например ```:```

```php 
...

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=europabank
DB_USERNAME=postgres
DB_PASSWORD=123456

...
```

3. Создание базы данных проекта.
4. Выполнение миграции
```php 
$ php artisan migrate
```


5. Заполнение БД 
```php 
$ php artisan db:seed
```


7. Установки зависимостей для фронтенд части
```
$ npm install
```


6. Запуск сервера
```php 
$ php artisan serve
```


7. Create User via tinker 

