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
        $sql = "SELECT * FROM books WHERE title LIKE :query OR author LIKE :query";
        $stmt = $this->db->prepare($sql);
    }
}