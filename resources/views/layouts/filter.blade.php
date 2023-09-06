<link rel="stylesheet" href="{{ asset('css/filter.css') }}">
<div class="filter">
    <form method="POST" action="{{ route('book.list') }}">
        @csrf
        <input type="hidden" name="method" value="takeByGenre">
        <p class="form-category">Показать</p>
        <p class="property-name">Жанры</p>
        <select class="select" name="genre">
            <option value="all" selected>Все</option>
            <option value="детектив">детектив</option>
            <option value="роман">роман</option>
            <option value="триллер">триллер</option>
            <option value="фантастика">фантастика</option>
            <option value="фентези">фентези</option>
            <option value="ужасы">ужасы</option>
            <option value="биография">биография</option>
            <option value="психология">психология</option>
            <option value="политика">политика</option>
            <option value="религия">религия</option>
            <option value="комедия">комедия</option>
            <option value="сказки">сказки</option>
            <option value="приключения">приключения</option>
            <option value="постапокалипсис">постапокалипсис</option>
            <option value="драма">драма</option>
            <option value="антиутопия">антиутопия</option>
            <option value="искусство">искусство</option>
        </select>
        <p class="property-name" >Сортировка</p>
        <select class="select" name="orderBy">
            <option value="desc" selected>С новых</option>
            <option value="asc">Со старых</option>
        </select>
        <div>
            <input type="submit" class="filter-button" value="Показать">
        </div>
    </form>
</div>
