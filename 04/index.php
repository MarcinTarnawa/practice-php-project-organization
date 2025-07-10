<?php

use Router\Router; 

//autoloader 
const BASE_PATH = __DIR__.'/';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

function base_path($path)
{
    return BASE_PATH . $path;
}

$router = new Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

var_dump($method);
var_dump($uri);

$router->route($uri, $method);