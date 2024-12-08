<?php

namespace App\Middleware;

class AuthMiddleware implements Middleware
{

    function before(): void
    {
        session_start();
        if (!isset($_SESSION['logged_in'])) {
            header('Location: /account/login');
            exit();
        }
    }
}