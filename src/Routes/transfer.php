<?php

use App\Controllers\Transfer;
use App\Router;

$router = new Router();

$router->get('/Transfer/', Transfer::class, 'index');
$router->get('/Transfer/index.php', Transfer::class, 'index');

$router->dispatch();
?>