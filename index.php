<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/config.php';

$pdo = Connection::make($config['database']);

$routes = new Routes('.view', '/views', "/../..");

// Now we can use the Router class and register the routes.
$router = new Router($routes->getRoutes());

// Direct the router based on the current request URI and require a view file.
require $router->direct(Request::uri());
