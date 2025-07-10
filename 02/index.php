<?php

use Core\Database;

$config = [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db',
        'charset' => 'utf8mb4'
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

// connect with database
try 
    {
    $db = new Database($config);
    $display = $db->query('SELECT * FROM db')->fetchAll();
    }
catch(PDOException $e)
    {
    die("Error: ".$e->getMessage());
    }

echo "Database class display with autoloader<br>";
foreach ($display as $key => $value) {
    echo $value['user'] . "<br>";
}