<?php

namespace Core;

use PDO;

class Database {
    
    public $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config,'',';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    //select records
    public function select($tableName, $page, $limit, $params) 
    {
        $statment = $this->connection->prepare("SELECT * FROM {$tableName} {$limit}");
          foreach ($params as $key => $value) {
            $statment->bindValue($key, $value, \PDO::PARAM_INT);
            }
        $statment->execute();
        return $statment;
    }
}