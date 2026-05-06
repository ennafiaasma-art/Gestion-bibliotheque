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

        if ($book && $book['isAvailable']=== 'Disponible'){
            $update = $this->db->prepare("UPDATE books SET isAvailable = 'Emprunte' WHERE isbn = ?");
            $update->execute([$isbn]);
            $loan = $this->db->prepare("INSERT INTO emprunts (member_id, id_book, dateReturn) VALUES (?,?,DATE_ADD(NOW(), INTERVAL 14 DAY))");
            return $loan->execute([$memberId, $isbn]);
        }
        return false;
    }
    
}