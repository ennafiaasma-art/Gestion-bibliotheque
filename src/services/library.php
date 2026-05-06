<?php
namespace LibCore\Services;

use PDO;
use PDOException;

class Library {
    private $db;

    public function _ _construct($dbConnection){
        $this->db = $dbConnection;
    }

    public function searchBook($query){
       
    }
}