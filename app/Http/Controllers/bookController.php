<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function getList($page=1)
    {
        $books = DB::table('books')
            ->join('bookgenres', 'books.id', '=', 'bookgenres.book_id')
            ->join('genres', 'genres.id', '=', 'bookgenres.genre_id')
            ->select('books.title',
                'books.author',
                'books.id',
                'books.image_path',
                'file_path',
                DB::raw('group_concat(genres.name) as genres')
            )
            ->skip($page*4-4)->take(4)
            ->groupBy('books.id')
            ->get();

        return view('pages/book_list', compact('books'));
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

        return view('pages/book_retell', compact('book'));
    }
}
