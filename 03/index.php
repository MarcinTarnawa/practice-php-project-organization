<?php

function rout($fileName, $uri, $params = [])
{
    if(! realpath("{$uri}/{$fileName}.view.php")) {
        return "Błędna scieżka";
    } else {
        return require realpath("{$uri}/{$fileName}.view.php");
    };
    extract($params);
   //test extraction
    echo "Ekstrakcja User: " . $user;
    return $params;
}

$reqFile = 'index';
$directory = 'views';
$params = ['user' => 'Marcin',
        'id' => '1',
    'method' => 'GET' ];

rout($reqFile, $directory, $params);