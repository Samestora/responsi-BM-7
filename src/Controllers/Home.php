<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Player;

class Home extends Controller
{
    public function index()
    {
        $this->render('index', []);
    }

    public function notfound(){
        $this->render('404', []);
    }
}