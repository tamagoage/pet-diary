<?php

declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';

use Tamagoage\PetDiary\Infra\Core\Exception\BadRequestException;
use Tamagoage\PetDiary\Infra\Core\Exception\RouteNotFoundException;
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

try {
    $route = $router->resolve();
    $handler = $route->handler();
    $handler();
} catch (BadRequestException $e) {
    header("HTTP/1.1 400 Bad Request");
    echo "400 - ないよー";
    exit();
} catch (RouteNotFoundException $e) {
    header("HTTP/1.1 404 Forbidden");
    echo "404 - ないよー";
    exit();
} catch (Throwable $e) {
    header("HTTP/1.1 500 Internal Server Error");
    echo "500";
    exit();
}
