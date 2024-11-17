<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Player;

class Home extends Controller
{
    public function index()
    {
        $Players = [
            new Player('My Third Player Entry', '2023'),
            new Player('My Second Player Entry', '2022'),
            new Player('My First Player Entry', '2021')
        ];
        $this->render('index', ['Players' => $Players]);
    }
}