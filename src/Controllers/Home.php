<?php

namespace App\Controllers;

use App\View;

class Home
{

    function index(): void
    {
        $model = [
            "title" => "Homes",
            "content" => "Content"
        ];

        View::render('index', $model);
    }

    function Error404(): void
    {
        $model = [
            "title" => "404"
        ];
        View::render('404', $model);
    }
}