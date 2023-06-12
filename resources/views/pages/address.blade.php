<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type = "text/css" rel = "stylesheet" href = "{{ asset('css/address.css') }}">
    <title>Document</title>
</head>
<body>
@include('layouts.header')
<article>
    <div class="tuit-div">
        <div class="div-logo">
            <img src="{{ asset('static/images/TUIT-logo.png') }}" class="tuit-logo">
        </div>
        <div>
            <p class="Name">Ташкентский Университет Информационных Технологий</p>
            <p class="Abbreviature">ТУИТ</p>
            <p class="adress">Адрес: Ташкент 100084, улица Шох Амира Темура дом 108</p>
            <p class="work-schedule">Рабочий график: Понедельник - Суббота 8:30 - 18:00</p>
            <button class="tuit-link" onclick="window.location.href = 'https://tuit.uz/';">Перейти на сайт ТУИТа</button>
            <p class="tuit-about">Ташкентский университет информационных технологий имени Мухаммада ал-Хоразмий (ТУИТ) является ведущим техническим университетом Республики Узбекистан по подготовке кадров в области информационных и телекоммуникационных технологий.
                Под названием «Ташкентский электротехнический институт связи» считался отраслевым институтом Министерства связи и в основном готовил инженеров электросвязи и радиосвязи для республик Средней Азии и Казахстана.</p>
        </div>
    </div>
    @include('layouts.footer')
</article>
</body>
</html>
