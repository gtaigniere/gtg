<?php

session_start();

require_once 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once 'config' . DIRECTORY_SEPARATOR . 'Autoloader.php';

use Config\{
    Autoloader,
    MyPdo
};
use Router\Router;

Autoloader::register();
$db = new MyPdo();
$router = new Router($_GET, $db);
$router->route();
