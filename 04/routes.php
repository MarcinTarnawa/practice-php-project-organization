<?php

$router->get('/', 'views/index.php');
$router->get('/create', 'controllers/create.php');
$router->get('/show', 'controllers/show.php');
$router->post('/', 'views/index.php');
$router->delete('/', 'views/index.php');