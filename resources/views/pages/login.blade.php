<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type = "text/css" rel = "stylesheet" href = "{{ asset('css/login.css') }}">
    <title>F-store</title>
</head>
<body>
    @include('layouts.header')
    <article>
        <div class="login-form">
            <div class="form-placeholder">
                <p class="form-name">Вход</p>
            </div>
            <form action="{{ route('check') }}" method="post">
                @csrf
                <p class="name-data">Имя пользователя</p>
                <input type="text" name="name" placeholder="Имя..." class="form-data">
                <p class="name-data">Пароль</p>
                <input type="password" name="password" placeholder="Пароль..." class="form-data">
                <input type="submit" value="Войти" class="submit">
            </form>
        </div>
        @include('layouts.footer')
    </article>
</body>
</html>
