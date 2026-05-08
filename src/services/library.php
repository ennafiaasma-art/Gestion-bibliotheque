<?php
namespace LibCore\services;

use PDO;
use PDOException;

class Library {
    private $db;

    public function __construct($dbConnection){
        $this->db = $dbConnection;
    }

    public function searchBook($query){
        $sql = "SELECT * FROM books WHERE title LIKE :query OR author LIKE :query";
        $stmt = $this->db->prepare($sql);
        $stmt ->execute(['query'=> "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function borrowBook($memberId, $isbn){
        $check = $this->db->prepare("SELECT isAvailable FROM books WHERE isbn = ?");
        $check->execute([$isbn]);
        $book = $check->fetch();

        if ($book && $book['isAvialable']=== 'Disponible'){
            $update = $this->db->prepare("UPDATE books SET isAvailable = 'Emprunte' WHERE isbn = ?");
            $update->execute([$isbn]);
            $loan = $this->db->prepare("INSERT INTO emprunts (member_id, id_book, dateReturn) VALUES (?,?,DATE_ADD(NOW(), INTERVAL 14 DAY))");
            return $loan->execute([$memberId, $isbn]);
        }
        return false;
    }
    public function returnBook($isbn){
        $update = $this->db->prepare("UPDATE books SET isAvailable ='Disponible' WHERE isbn = ?");
        $update->execute([$isbn]);

        $delete = $this->db->prepare("DELETE FROM emprunts WHERE id_book = ?");
        return $delete->execute([$isbn]);
    }
    public function getMemberLoans($memberId){
        $sql = "SELECT b.title, b.isbn, e.dateReturn
        FROM books b
        JOIN emprunts e ON b.isbn = e.id_book
        WHERE e.member_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$memberId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}