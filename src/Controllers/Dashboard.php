<?php

namespace App\Controllers;

use App\View;
use App\Middleware\AuthMiddleware;

class Dashboard
{

    function index(): void
    {
        $Auth = new AuthMiddleware();
        $Auth->before();
        
        $model = [
            'title' => 'Dashboard',
            'username' => $_SESSION['logged_in']['name'],
            'role_id' => $_SESSION['logged_in']['role_id'],
            'email' => $_SESSION['logged_in']['email'] 
        ];

        View::render('Dashboard/index', $model);
    }
}