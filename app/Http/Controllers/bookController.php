<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;

class bookController extends Controller
{
    #[NoReturn] public function index() {
        $books = DB::table('books')
            ->join('bookgenres', 'books.id', '=', 'bookgenres.book_id')
            ->join('genres', 'genres.id', '=', 'bookgenres.genre_id')
            ->select('books.title', DB::raw('group_concat(genres.name) as genres'))
            ->where('books.id', '=', 1)
            ->groupBy('books.title')->get();
        dd($books);
    }
    public function create()
    {
        $newBook=[
            'title' => 'Алхимик',
            'author' => 'Пауло Коэльо',
            'brief_retelling' => 'Предисловие написано от лица автора, отдавшего 11 лет жизни изучению алхимии. Он предупреждает, что «Алхимик» — книга символическая.
Свои исследования автор начал в середине семидесятых. В то время он все свои деньги тратил на книги по алхимии и знакомился с другими алхимиками, но его «усердие и рвение не давали абсолютно никаких результатов». Книги были написаны замысловатым языком, а мнимые алхимики тщательно охраняли свои секреты.',
            'image_path' => 'Alchemist.png'
        ];
        Book::create($newBook);
    }

    public function update()
    {
        $changes = [
          'title' => 'Алкимик'
        ];

        $book = Book::find(7);
        $book->update($changes);
    }

    public function delete()
    {
        $book = Book::find(7);
        $book->delete();
    }

    public function firstOrCreate()
    {
        $anotherBook = [
            'title' => 'Алхимик',
            'author' => 'Пауло Коэльо',
            'brief_retelling' => 'Предисловие написано от лица автора, отдавшего 11 лет жизни изучению алхимии. Он предупреждает, что «Алхимик» — книга символическая.
Свои исследования автор начал в середине семидесятых. В то время он все свои деньги тратил на книги по алхимии и знакомился с другими алхимиками, но его «усердие и рвение не давали абсолютно никаких результатов». Книги были написаны замысловатым языком, а мнимые алхимики тщательно охраняли свои секреты.',
            'image_path' => 'Alchemist.png'
        ];

        $book = Book::firstOrCreate([
            'title' => 'Алхимик'
        ],[
            'title' => 'Алхимик',
            'author' => 'Пауло Коэльо',
            'brief_retelling' => 'Предисловие написано от лица автора, отдавшего 11 лет жизни изучению алхимии. Он предупреждает, что «Алхимик» — книга символическая.
Свои исследования автор начал в середине семидесятых. В то время он все свои деньги тратил на книги по алхимии и знакомился с другими алхимиками, но его «усердие и рвение не давали абсолютно никаких результатов». Книги были написаны замысловатым языком, а мнимые алхимики тщательно охраняли свои секреты.',
            'image_path' => 'Alchemist.png'
        ]);
        dump($book->content);
        dump($book);
    }
}
