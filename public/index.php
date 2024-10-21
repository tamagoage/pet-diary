<?php 
require_once __DIR__ . '/../vendor/autoload.php';

use Tamagoage\PetDiary\Core\Request;
use Tamagoage\PetDiary\Core\Router;

$request = new Request;
echo 'path:  '.$request->getPath().'<br>';
echo 'method:  '.$request->getMethod().'<br>';

// $router = new Router();
// $path1 = $router->get('/home', function(){
//     echo "getがうまく機能している";
// });

// $path1->resolve;

// リクエストオブジェクトを作成
$request = new Request();

// ルーターオブジェクトを作成
$router = new Router($request);

// ルートを定義
$router->get('/home', function(){
    echo "getがうまく機能している";
});

// ルートを解決
$router->resolve();


