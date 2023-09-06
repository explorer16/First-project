<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setParams
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $params = [
            'where' => null,
            'orderBy' => 'asc',
        ];
        if ($request->isMethod('post')) {
            if ($request->has('title')) {
                $params['where'] = 'books.title LIKE %' . $request->input('title') . '%';
            } elseif ($request->has('genre')) {
                $params['where'] = 'genres.name = '. $request->input('genre');
                if ($params['where'] == 'genres.name = all')  {
                    $params['where'] = 'books.id != 0';
                }
                $params['orderBy'] = $request->input('orderBy');
            }
        } elseif ($request->isMethod('get')&&!$request->has('page')) {
            $params['where'] = 'books.id != 0';
        } elseif ($request->isMethod('get')&&$request->has('page')) {
            $page = $request->input('page');
            $request->session()->put('page', $page);
        }

        if (isset($params['where'])) {
            $request->session()->put('search_params', $params['where']);
            $request->session()->put('orderBy', $params['orderBy']);
            $request->session()->put('page', 1);
        }
        return $next($request);
    }
}
