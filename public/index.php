<?php

declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';

use Tamagoage\PetDiary\Infra\Core\Request;
use Tamagoage\PetDiary\Infra\Core\Route;
use Tamagoage\PetDiary\Infra\Core\Router;

// ルートを定義
$routes = [
    Route::get(
        '/home',
        static function (): void {
            echo "Routeクラスが有効";
        },
    ),
];

$router = new Router(new Request(), $routes);

$route = $router->resolve();
$handler = $route->handler();
$handler();
