<?php
use App\Core\Router;
use App\Core\Request;

/* use App\Core\ {Router, Request}*/

require __DIR__.'/vendor/autoload.php';

require __DIR__.'/core/bootstrap.php';

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
