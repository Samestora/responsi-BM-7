<?php

use App\Controllers\Home;
use App\Router;

$router = new Router();

$router->get('/', Home::class, 'index');
$router->get('/index.php', Home::class, 'index');

$router->dispatch();
?>