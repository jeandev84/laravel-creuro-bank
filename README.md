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
```
$ php artisan tinker 

Psy Shell v0.11.8 (PHP 8.0.20 — cli) by Justin Hileman
>>> use App\Models\User;
>>> User::factory()->create(['email' => 'demo@gmail.com', 'password' => Hash::make('123')]);
=> App\Models\User {#4551
     name: "Tamia Hegmann",
     email: "demo@gmail.com",
     email_verified_at: "2022-08-18 13:42:36",
     #password: "123",
     #remember_token: "F9s6MzMsBU",
     updated_at: "2022-08-18 13:42:36",
     created_at: "2022-08-18 13:42:36",
     id: 2,
   }
```
