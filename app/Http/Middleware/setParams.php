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
        if ($request->isMethod('post')) {
            if ($request->has('title')) {
                $params = 'books.title LIKE %' . $request->input('title') . '%';
            } elseif ($request->has('filters')) {
                // TODO: Handle filters
            }
        } elseif ($request->isMethod('get')&&!$request->has('page')) {
            $params = 'books.id != 0';
        }

        if (isset($params)) {
            $request->session()->put('search_params', $params);
        }
        return $next($request);
    }
}
