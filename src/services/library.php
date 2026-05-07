<?php

require_once __DIR__ . "/../Connection.php";
require_once __DIR__ . "/../Entities/Member.php";

class Library {

    private $db;

    public function __construct() {
        $database = new Db();
        $this->db = $database->connect();
    }

    // Ajouter un livre
    public function addBook($title, $author, $year) {

        try {

            $sql = "INSERT INTO books (title, author, year)
                    VALUES (:title, :author, :year)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':year', $year);

            $stmt->execute();

            return "Livre ajouté avec succès";

        } catch (PDOException $e) {

            return "Erreur: " . $e->getMessage();
        }
    }

    // Ajouter un membre
    public function addMember(Member $member): string {

        try {

            $sql = "INSERT INTO members (name, email, type)
                    VALUES (:name, :email, :type)";

            $stmt = $this->db->prepare($sql);

            $name = $member->getName();
            $email = $member->getEmail();
            $type = $member->getType();

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':type', $type);

            $stmt->execute();

            return "Membre ajouté avec succès";

        } catch (PDOException $e) {

            return "Erreur : " . $e->getMessage();
        }
    }
}

?>