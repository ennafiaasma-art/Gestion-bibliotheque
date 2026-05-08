<?php

require_once __DIR__ . "/../Connection.php";
require_once __DIR__ . "/../Entities/Member.php";

class Library {

    private PDO $db;

    public function __construct() {
        $database = new Db();
        $this->db = $database->connect();
    }

    // Ajouter un livre
    public function addBook(
        string $title,
        string $author,
        string $isbn,
        string $isAvailable = "Yes"
    ) {

        try {

            $sql = "INSERT INTO books (
                        title,
                        author,
                        isbn,
                        isAvailable
                    )
                    VALUES (
                        :title,
                        :author,
                        :isbn,
                        :isAvailable
                    )";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->bindParam(':isAvailable', $isAvailable);

            $stmt->execute();

            return "Livre ajoute avec succes";

        } catch (PDOException $e) {

            return "Erreur : " . $e->getMessage();
        }
    }

    // Ajouter membre
    public function addMember(Member $member): string {

        try {

            $sql = "INSERT INTO members (name, email, type)
                    VALUES (:name, :email, :type)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':name', $member->getName());
            $stmt->bindValue(':email', $member->getEmail());
            $stmt->bindValue(':type', $member->getType());

            $stmt->execute();

            return "Membre ajoute avec succes";

        } catch (PDOException $e) {

            return "Erreur : " . $e->getMessage();
        }
    }

    // Afficher livres
    public function showBooks() {

        try {

            $sql = "SELECT * FROM books";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($books)) {
                echo "Aucun livre trouve\n";
                return;
            }

            foreach ($books as $book) {

                echo "ID : " . $book['id'] . PHP_EOL;
                echo "Titre : " . $book['title'] . PHP_EOL;
                echo "Auteur : " . $book['author'] . PHP_EOL;
                echo "ISBN : " . $book['isbn'] . PHP_EOL;
                echo "Disponible : " . $book['isAvailable'] . PHP_EOL;

                echo "----------------------\n";
            }

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
