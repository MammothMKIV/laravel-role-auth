1. Создаем приложение: composer create-project --prefer-dist laravel/laravel .
2. Настраиваем приложение
3. Инициализируем стандартную систему авторизации: php artisan make:auth
4. Создаём модель для ролей и связанную с ней миграцию: php artisan make:model Role -m
5. Создаем миграцию для привязки ролей к пользователям: php artisan make:migration create_role_user_table
6. Создаем сидер для генерации тестовых ролей: php artisan make:seed RoleTableSeeder
7. Создаем сидер для генерации тестовых пользователей: php artisan make:seed UserTableSeeder
8. Запускаем миграции и заполняем таблицы тестовыми данными: php artisan migrate:refresh --seed
9. Создаем middleware для проверки ролей: php artisan make:middleware CheckRole
10. Подключаем middleware в kernel
11. Задаем middleware на уровне конструкторов контроллеров
12. Создаем шаблоны для контроллеров пользователей, модераторов, администраторов
13. Создаем шаблон для страницы в случае отсутствия доступа
14. Создаем маршруты для тестовых путей.
