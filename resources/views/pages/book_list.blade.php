<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="private">
    <link type = "text/css" rel = "stylesheet" href = "{{ asset('css/bookList.css') }}">
    <title>F-store</title>
</head>
<body>
@include('layouts.header')
<article>
    <div class="books">
        @foreach($books as $book)
            <div class="book">
                <div class="conteyner_img">
                    <img src="{{ asset('book-components/cover/'.$book->image_path) }}" class="book-img" alt="404">
                </div>
                <p class="book-name">{{ $book->title }}</p>
                <p class="autor">{{ $book->author }}</p>
                <p class="janr">{{ $book->genres }}</p>
                <button class="download-button"><a href='{{ asset('book-components/files/'.$book->file_path) }}' download><img src="{{ asset('static/images/download-button.png') }}" class="download-image"></a></button>
                <button class="book_retell_button" onclick="window.location.href = '{{ route('retell', ['page' => $book->id]) }}';">Описание</button>
            </div>
        @endforeach
        {{--<form class="page-button-form">
            <?php
            if($countPages<=5&&$countPages!=1):
            for($i=1;$i<=$countPages;$i++):?>
            <input type="submit" class="page-button" name="page" value="<?=$i?>" style="width:<?=100/$countPages?>%" >
            <?php endfor;
            elseif ($countPages>5):?>
            <input type="submit" class="prev" name="page" value="First">
            <?php $middleId=\UserClasess\calculateMiddleButton::calculate($currentPage,$countPages);
            for($i=$middleId-2;$i<=$middleId+2;$i++):?>
            <input type="submit" class="page-button" name="page" value="<?=$i?>" style="width:12%" >
            <?php endfor;?>
            <input type="submit" class="last" name="page" value="Last">
            <?php endif; ?>
        </form>--}}
    </div>
    @include('layouts.footer')
</article>
</body>
</html>


