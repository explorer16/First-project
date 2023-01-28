<?php

namespace App\Http\Controllers;

class showController extends Controller
{
    public function show():void
    {
        echo <<<FORM
        <form action="/user/registration" method="post">
        <input type="submit" value="Регистрация">
        <input type="hidden" name="CSRFToken" value="l5824xNMAYFesBxing975yR8HPJlHZ">
        </form>
        <br>
        <form action="/user/authentication" method="post">
        <input type="submit" value="Авторизация">
        <input type="hidden" name="CSRFToken" value="l5824xNMAYFesBxing975yR8HPJlHZ">
        </form>
        FORM;
    }
}
