<?php

use Core\Database;
use Core\Pagination;

$config = [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db',
        'charset' => 'utf8mb4'
];

// replace backslash into system directory separator
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require "{$class}.php";
});

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

//display Pagionation class
echo "Pagination class connect <br>";
$result = new Pagination(9,2);
$result->prepare();

$result2 = new Pagination(40,10);
$result2->prepare();

$result3 = new Pagination(10,3);
$result3->prepare();

//display names on screen
echo "Database class connect <br>";
foreach ($display as $key => $value) {
    echo $value['user'] . "<br>";
}