<?php

namespace Core;

class PageController {
    private $db;
    private $dbName;
    public $page;

    public function __construct(Database $db, $table) {
        $this->db = $db;
    }

    public function display($results){
        $output = "";
        if (empty($results)) {
            $output = 'No data to display';
        } else {
            foreach ($results as $key) {
                $output .= htmlspecialchars($key['id']) . " " . htmlspecialchars($key['name']) . "<br>";
            }; 
        }
        return $output;
    }

    public function initRows($table, $usePagination, $page) {
        $offset = 10;
        $params = [];
        $limit = "";
        if($usePagination === true){
            $page = $page*10-10;
            $limit = "LIMIT :offset OFFSET :page";
            $params = [
                ':offset' => $offset,
                ':page' => $page ];
        }
        $stmt = $this->db->select($table, $page, $limit, $params);
        return $stmt->fetchAll();
    }
} 