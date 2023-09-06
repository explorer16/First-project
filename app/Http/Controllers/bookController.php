<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function getList($page=1)
    {
        $page = session('page', $page);

        $params = session('search_params');
        $paramsArray[] = explode(' ', $params);

        $paramsOrderBy = session('orderBy');

        $baseQuery = DB::table('books')
            ->join('bookgenres', 'books.id', '=', 'bookgenres.book_id')
            ->join('genres', 'genres.id', '=', 'bookgenres.genre_id')
            ->where($paramsArray);

        $bookQuery = clone $baseQuery;
        $books = $bookQuery->select('books.title',
                'books.author',
                'books.id',
                'books.image_path',
                'books.file_path',
                DB::raw('group_concat(genres.name) as genres')
            )
            ->groupBy('books.id')
            ->orderBy('books.id', $paramsOrderBy)
            ->skip($page*4-4)
            ->limit(4)
            ->get();

        $countQuery = clone $baseQuery;
        $countPages = count($countQuery->select('books.id')->groupBy('books.id')->get());
        $countPages = ceil($countPages/4);

        $conditions = [
            ($page == $countPages) => $page - 2,
            ($page == $countPages - 1) => $page - 1,
            ($page == 1 || $page == 2) => 3,
        ];

        $middlePage = $conditions[true] ?? $page;


        return view('pages/book_list', compact('books', 'countPages', 'page', 'middlePage'));
    }

    public function getBookInfo(int $id)
    {

        $book=DB::table('books')
            ->join('bookgenres', 'books.id', '=', 'bookgenres.book_id')
            ->join('genres', 'genres.id', '=', 'bookgenres.genre_id')
            ->select('title',
                'author',
                'brief_retelling',
                'image_path',
                DB::raw('group_concat(genres.name) as genres')
            )
            ->where('books.id', '=', $id)
            ->first();
        $book->bookListId = $_COOKIE['page'];
        return view('pages/book_retell', compact('book'));
    }
}
