<?php
    require_once '../vendor/autoload.php';

    use App\Controllers\Home;
    use App\Controllers\Transfer;
    use App\Router;

    $router = new Router();

    $router->get('/404', Home::class, 'notfound');
    $router->get('/', Home::class, 'index');
    $router->get('/index.php', Home::class, 'index');
    $router->get('/Transfer/', Transfer::class, 'index');
    $router->get('/Transfer/index.php', Transfer::class, 'index');

    $router->dispatch();
?>