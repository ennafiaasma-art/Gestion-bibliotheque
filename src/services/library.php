<?php
require_once "Db.php";

class Library {
    private $db;

    public function __construct() {
        $database = new Db();
        $this->db = $database->connect();
    }

    // 🔹 ajouter un livre
    public function addBook($title, $author, $year) {
        try {
            $sql = "INSERT INTO books (title, author, year) VALUES (:title, :author, :year)";
            
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':year', $year);

            $stmt->execute();

            return "Livre ajouté avec succès";
        } catch(PDOException $e) {
            return "Erreur: " . $e->getMessage();
        }
    }
}
?>