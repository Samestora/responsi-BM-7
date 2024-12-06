<?php
    require_once '../vendor/autoload.php';

    use App\Controllers\Home;
    use App\Controllers\Transfer;
    use App\Controllers\Team;
    use App\Controllers\Dashboard;
    use App\Controllers\Registration;
    use App\Middleware\AuthMiddleware;
    use App\Router;


    Router::add('GET', '/', Home::class, 'index');

    Router::add('GET', '/account/login', Registration::class, 'login');
    Router::add('POST', '/account/login', Registration::class, 'login');

    Router::add('GET', '/account/signin', Registration::class, 'signin');
    Router::add('POST', '/account/signin', Registration::class, 'signin');

    Router::add('GET','/account/logout', Registration::class, 'logout');
    Router::add('POST','/account/delete', Registration::class, 'delete');
    
    Router::add('GET','/dashboard', Dashboard::class, 'index');
    Router::add('POST', '/dashboard/update', Dashboard::class, 'update');

    Router::add('GET', '/transfer', Transfer::class, 'index');
    Router::add('GET', '/team', Team::class, 'index');
    Router::add('GET', '/404', Home::class, 'Error404');

    Router::run();
?>