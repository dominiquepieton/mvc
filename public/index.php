<?php

use App\Core\Main;
use App\Autoloader;

define('ROOT', dirname(__DIR__));

require_once ROOT.'/autoloader.php';

Autoloader::register();

$app = new Main();
$app->start();