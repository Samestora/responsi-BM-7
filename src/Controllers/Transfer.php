<?php

namespace App\Controllers;

use App\Controller;

class Transfer extends Controller 
{
    public function index() 
    {
        $this->render('transfer', []);
    }
}