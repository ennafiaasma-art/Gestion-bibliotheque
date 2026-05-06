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
        $stmt ->execute(['query'=> "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function borrowBook($memberId, $isbn){
        $check = $this->db->prepare("SELECT isAvialable FROM books WHERE isbn = ?");
        $check->execute([$isbn]);
        $book = $check->fetch();
    }
}