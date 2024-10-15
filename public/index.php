<?php 
require_once __DIR__ . '/../vendor/autoload.php';

// BladeOneの設定
use eftec\bladeone\BladeOne;

$views = __DIR__ . '/../src/Views';
$cache = __DIR__ . '/../storage/cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
echo $blade->run("hello",array("variable1"=>"value1"));

// エラー表示設定（開発中のみ）
if (getenv('APP_DEBUG') === 'true') {
    $blade->setMode(BladeOne::MODE_DEBUG);
}

