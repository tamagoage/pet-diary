<?php 
require_once __DIR__ . '/../vendor/autoload.php';

use Tamagoage\PetDiary\Core\Request;

$request = new Request;
echo 'path:  '.$request->getPath().'<br>';
echo 'method:  '.$request->getMethod().'<br>';