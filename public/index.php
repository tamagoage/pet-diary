<?php

declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';

use Tamagoage\PetDiary\Core\Request;
use Tamagoage\PetDiary\Core\Router;

$request = new Request();
$router = new Router($request);

// ルートを定義
$router->get('/home', function () {
    echo "getがうまく機能している";
});

$router->resolve();
