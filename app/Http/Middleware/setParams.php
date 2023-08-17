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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['title']) && !empty($_POST['title'])) {
                $params = 'books.title LIKE %' . $_POST['title'] . '%';
            } elseif (isset($_POST['filters'])) {
                // TODO: Handle filters for the week
            }
        } elseif (isset($_GET['page'])) {
            // Assuming that $next is a valid callback or function reference
            return $next($request);
        } else {
            $params = 'books.id != 0';
        }

// Make sure to escape the parameter before setting it in the cookie to prevent potential security issues.
        if (isset($params)) {
            $escapedParams = base64_encode($params);
            setcookie('parameters', $escapedParams, 0, '/book');
        }

// Assuming that $next is a valid callback or function reference
        return $next($request);
    }
}
