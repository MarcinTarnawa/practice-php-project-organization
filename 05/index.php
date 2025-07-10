<?php

use Core\Database;
use Core\PageController;

$config = [
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db',
        'charset' => 'utf8mb4'
    ]
];

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

// $tableName = 'posts';

$page = $_GET['page'] ?? 1;
// $limit ="";

//database connection
try 
    {
        $db = new Database($config['database']);
        $controller = new PageController($db, 'posts');
        $post = $controller->initRows($table='posts', $usePaganation=true, $page);
        $display = $controller->display($post);
    }
catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }

require 'views/index.php';