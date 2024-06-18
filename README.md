# My First Laravel Project

## Описание

Добро пожаловать в репозиторий моего первого пет-проекта на Laravel! Этот проект создан для демонстрации моих навыков работы с Laravel и Blade шаблонами. Здесь вы найдете базовую структуру приложения, включающую основные функции и примеры использования Blade для динамической генерации HTML.

## Технологии

Проект построен с использованием следующих технологий:

- **Laravel**: фреймворк для веб-приложений на PHP.

## Установка

Для локальной установки проекта выполните следующие шаги:

1. Клонируйте репозиторий на свой компьютер:
    ```bash
    git clone https://github.com/yourusername/your-repo-name.git
    ```

2. Перейдите в директорию проекта:
    ```bash
    cd your-repo-name
    ```

3. Установите зависимости с помощью Composer:
    ```bash
    composer install
    ```

4. Скопируйте файл настроек:
    ```bash
    cp .env.example .env
    ```

5. Сгенерируйте ключ приложения:
    ```bash
    php artisan key:generate
    ```

6. Настройте подключение к базе данных в файле `.env`.

7. Запустите миграции для создания таблиц в базе данных:
    ```bash
    php artisan migrate
    ```

8. Запустите сервер разработки:
    ```bash
    php artisan serve
    ```

Теперь ваше приложение доступно по адресу `http://localhost:8000`.

## Структура проекта

- **routes/web.php**: файл маршрутов веб-приложения.
- **resources/views**: директория с Blade шаблонами.
- **app/Http/Controllers**: директория с контроллерами.

## Основные функции

В проекте реализованы следующие основные функции:

- Маршрутизация запросов.
- Рендеринг страниц с использованием Blade шаблонов.
- Пример контроллера для обработки логики приложения.
