<?php

namespace App\Controllers;

use App\View;

class Home
{

    function index(): void
    {
        $model = [
            "title" => "Home",
            "content" => "Content"
        ];

        View::render('index', $model);
    }
    function honor(): void
    {
        $model = [
            "title" => "honor",
            "content" => "Content"
        ];

        View::render('honor', $model);
    }
    function news(): void
    {
        $model = [
            "title" => "news",
            "content" => "Content"
        ];

        View::render('news', $model);
    }

    function Error404(): void
    {
        $model = [
            "title" => "404"
        ];
        View::render('404', $model);
    }
}