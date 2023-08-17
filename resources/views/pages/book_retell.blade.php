<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type = "text/css" rel = "stylesheet" href = "{{ asset('css/bookRetell.css') }}">
    <title>F-store</title>
</head>
<body>
    @include('layouts.header')
    <article>
    <div class="retell-area">
        <div class="image-area">
            <img src="{{ asset('book-components/cover/'.$book->image_path) }}" alt="404">
        </div>
        <div class="name-pos">
            <p class="book-name">{{ $book->title }}</p>
        </div>
        <div class="property">
            <p class="property-text">{{ $book->author }}</p>
            <p class="property-text">{{ $book->genres }}</p>
        </div>
        <div class="retelling-pos">
            <p class="retelling-text">{{ $book->brief_retelling }}</p>
        </div>
        <button class="return-button" onclick="window.location.href='{{ route('book.list', ['page'=>$book->bookListId]) }}';">Вернуться к списку книг</button>
    </div>
    @include('layouts.footer')
    </article>
</body>
</html>
